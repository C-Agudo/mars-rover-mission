<?php

namespace Tests\SpaceExploration\Vehicles\Application\VehicleLanding;

use Src\SpaceExploration\Vehicles\Application\VehicleLanding\VehicleLandingCommand;

class VehicleLandingCommandMother
{
    public static function create(
        string $id,
        array $position,
        string $orientation,
        string $planetName
    ): VehicleLandingCommand{
        return new VehicleLandingCommand(
            $id,
            $position,
            $orientation,
            $planetName
        );
    }

}
