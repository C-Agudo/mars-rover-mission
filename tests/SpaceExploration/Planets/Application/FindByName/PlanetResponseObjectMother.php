<?php

namespace Tests\SpaceExploration\Planets\Application\FindByName;

use Src\SpaceExploration\Planets\Application\PlanetResponse;

class PlanetResponseObjectMother
{
    public static function create(?string $id = null, ?string $name= null, ?array $coordinates=null, ?array $obstaclesCoordinates=null): PlanetResponse
    {
        return new PlanetResponse($id, $name, $coordinates, $obstaclesCoordinates);
    }

}
