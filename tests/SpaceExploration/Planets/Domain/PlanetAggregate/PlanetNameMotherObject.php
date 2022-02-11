<?php

namespace Tests\SpaceExploration\Planets\Domain\PlanetAggregate;

use Src\SpaceExploration\Planets\Domain\PlanetAggregate\PlanetName;
use Tests\Shared\Domain\WordMother;

class PlanetNameMotherObject
{
    public static function create(?string $value = null): PlanetName{
        return new PlanetName($value ?? WordMother::create());
    }
}
