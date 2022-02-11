<?php

namespace Src\SpaceExploration\Planets\Infrastructure\Persistence;

use Src\SpaceExploration\Planets\Domain\PlanetAggregate\Planet;
use Src\SpaceExploration\Planets\Domain\PlanetFactoryInterface;
use Src\SpaceExploration\Planets\Domain\PlanetRepositoryInterface;
use Src\SpaceExploration\Planets\Infrastructure\Persistence\Models\InMemoryMarsModel;

class InMemoryPlanetRepository implements PlanetRepositoryInterface
{
    private PlanetFactoryInterface $factory;

    public function __construct(PlanetFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function searchByName(string $name): Planet
    {
        return $this->factory->create(
            InMemoryMarsModel::ID,
            InMemoryMarsModel::NAME,
            InMemoryMarsModel::COORDINATES,
            InMemoryMarsModel::OBSTACLES_COORDINATES
        );
    }
}
