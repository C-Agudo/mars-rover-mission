<?php

namespace Src\SpaceExploration\Vehicles\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Src\Shared\Infrastructure\Controllers\ApiController;
use Src\SpaceExploration\Vehicles\Application\VehicleMove\VehicleMoveCommand;
use Src\SpaceExploration\Vehicles\Domain\Exceptions\VehicleCollisionError;
use Src\SpaceExploration\Vehicles\Domain\Exceptions\VehicleInstructionNotValid;
use Src\SpaceExploration\Vehicles\Domain\Exceptions\VehicleNotExistError;

class VehicleMovePatchController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $bodyContent = json_decode($request->getContent(), true);

        $validator = Validator::make($bodyContent, [
            'id' => 'required',
            'instructions' => 'required',
            'planet_name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->getMessageBag(), Response::HTTP_BAD_REQUEST);
        }
        try{
            $this->dispatch(
                new VehicleMoveCommand(
                    $bodyContent['id'],
                    str_split($bodyContent['instructions']),
                    $bodyContent['planet_name']
                )
            );
        }catch (VehicleCollisionError $collisionError){
            return response()->json($collisionError->errorMessage(), $collisionError->errorCode());
        }catch (VehicleNotExistError $notExistError){
            return response()->json($notExistError->errorMessage(), $notExistError->errorCode());
        }catch (VehicleInstructionNotValid $notValidInstruction){
            return response()->json($notValidInstruction->errorMessage(), $notValidInstruction->errorCode());
        }
        return response()->json('Ok', Response::HTTP_OK);
    }
}
