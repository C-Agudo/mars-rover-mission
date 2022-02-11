<?php

namespace Src\SpaceExploration\Planets\Domain;

use Src\SpaceExploration\Planets\Domain\PlanetAggregate\Planet;

interface PlanetFactoryInterface
{
    public function create(
        string $id,
        string $name,
        array $coordinates,
        array $obstaclesCoordinates
    ): ?Planet;
}
