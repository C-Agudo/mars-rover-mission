<?php

namespace Src\SpaceExploration\Vehicles\Domain\Validators;

use Src\SpaceExploration\Vehicles\Domain\Exceptions\VehicleCollisionError;

class CollisionDetectorValidator
{
    public function validate(array $nextPosition, array $planetObstaclesCoordinates){

        foreach($planetObstaclesCoordinates as $obstacleCoordinate){
            if($nextPosition == $obstacleCoordinate){
                throw new VehicleCollisionError($nextPosition);
            }
        }
    }
}
