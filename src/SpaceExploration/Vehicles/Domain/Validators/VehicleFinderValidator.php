<?php

namespace Src\SpaceExploration\Vehicles\Domain\Validators;

use Src\SpaceExploration\Vehicles\Domain\Exceptions\VehicleNotExistError;
use Src\SpaceExploration\Vehicles\Domain\VehicleAggregate\Vehicle;

class VehicleFinderValidator
{

    public function validate(?Vehicle $vehicle, string $id){
        if($vehicle === null){
            throw new VehicleNotExistError($id);
        }
    }
}
