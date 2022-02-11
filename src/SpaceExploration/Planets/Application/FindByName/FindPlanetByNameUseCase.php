<?php

namespace Src\SpaceExploration\Planets\Application\FindByName;

use Src\SpaceExploration\Planets\Application\PlanetResponse;
use Src\SpaceExploration\Planets\Domain\PlanetAggregate\Planet;
use Src\SpaceExploration\Planets\Domain\PlanetRepositoryInterface;

class FindPlanetByNameUseCase
{
    private PlanetRepositoryInterface $repository;

    public function __construct(
        PlanetRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(FindPlanetByNameQuery $query): PlanetResponse
    {
        $planet = $this->repository->searchByName($query->name());
        return $this->toResponse($planet);
    }

    private function toResponse(Planet $planet): PlanetResponse{
        return new PlanetResponse(
            $planet->id()->value(),
            $planet->name()->value(),
            $planet->coordinates()->value(),
            $planet->obstaclesCoordinates()->value()
        );
    }
}
