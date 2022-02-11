<?php

namespace Src\SpaceExploration\Planets\Domain;

use Src\SpaceExploration\Planets\Domain\PlanetAggregate\Planet;

interface PlanetRepositoryInterface
{
    public function searchByName(string $name): ?Planet;
}
