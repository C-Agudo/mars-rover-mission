<?php

namespace Tests\SpaceExploration\Planets\Application\FindByName;

use Src\SpaceExploration\Planets\Application\FindByName\FindPlanetByNameQuery;
use Tests\SpaceExploration\Planets\Domain\PlanetAggregate\PlanetNameMotherObject;

class FindPlanetByNameQueryMotherObject
{
    public static function create(
        ?string $name = null
    ): FindPlanetByNameQuery{
        return new FindPlanetByNameQuery(
            PlanetNameMotherObject::create()->value()
        );
    }
}
