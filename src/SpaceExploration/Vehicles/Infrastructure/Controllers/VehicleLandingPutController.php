<?php

namespace Src\SpaceExploration\Vehicles\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Src\Shared\Infrastructure\Controllers\ApiController;
use Src\SpaceExploration\Vehicles\Application\VehicleLanding\VehicleLandingCommand;
use Src\SpaceExploration\Vehicles\Domain\Exceptions\VehicleCollisionError;
use Src\SpaceExploration\Vehicles\Domain\Exceptions\VehicleOrientationError;

class VehicleLandingPutController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {

        $bodyContent = json_decode($request->getContent(), true);

        $validator = Validator::make($bodyContent, [
            'id' => 'required',
            'position' => 'required',
            'orientation' => 'required',
            'planet_name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->getMessageBag(), Response::HTTP_BAD_REQUEST);
        }
        try{
            $this->dispatch(
                new VehicleLandingCommand(
                    $bodyContent['id'],
                    $bodyContent['position'],
                    $bodyContent['orientation'],
                    $bodyContent['planet_name']
                )
            );
        }catch (VehicleCollisionError $collisionError){
            return response()->json($collisionError->errorMessage(), $collisionError->errorCode());
        }catch (VehicleOrientationError $orientationError){
            return response()->json($orientationError->errorMessage(), $orientationError->errorCode());
        }

        return response()->json('Ok', Response::HTTP_OK);
    }
}
