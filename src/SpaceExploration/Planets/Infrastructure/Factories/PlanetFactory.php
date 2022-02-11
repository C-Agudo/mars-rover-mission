<?php

namespace Src\SpaceExploration\Planets\Infrastructure\Factories;

use Src\SpaceExploration\Planets\Domain\PlanetAggregate\Planet;
use Src\SpaceExploration\Planets\Domain\PlanetAggregate\PlanetCoordinates;
use Src\SpaceExploration\Planets\Domain\PlanetAggregate\PlanetId;
use Src\SpaceExploration\Planets\Domain\PlanetAggregate\PlanetName;
use Src\SpaceExploration\Planets\Domain\PlanetAggregate\PlanetObstaclesCoordinates;
use Src\SpaceExploration\Planets\Domain\PlanetFactoryInterface;

class PlanetFactory implements PlanetFactoryInterface
{

    public function create(string $id, string $name, array $coordinates, array $obstaclesCoordinates): ?Planet
    {
        return new Planet(
            new PlanetId($id),
            new PlanetName($name),
            new PlanetCoordinates($coordinates),
            new PlanetObstaclesCoordinates($obstaclesCoordinates)
        );
    }
}
