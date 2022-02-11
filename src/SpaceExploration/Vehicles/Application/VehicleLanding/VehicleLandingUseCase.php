<?php

namespace Src\SpaceExploration\Vehicles\Application\VehicleLanding;

use Src\Shared\Domain\Bus\Query\QueryBusInterface;
use Src\SpaceExploration\Planets\Application\FindByName\FindPlanetByNameQuery;
use Src\SpaceExploration\Vehicles\Domain\Validators\CollisionDetectorValidator;
use Src\SpaceExploration\Vehicles\Domain\VehicleRepositoryInterface;

class VehicleLandingUseCase
{
    private VehicleRepositoryInterface $repository;
    private CollisionDetectorValidator $collisionDetector;
    private QueryBusInterface $queryBus;

    public function __construct(
        VehicleRepositoryInterface $repository,
        CollisionDetectorValidator $collisionDetector,
        QueryBusInterface $queryBus
    )
    {
        $this->repository = $repository;
        $this->collisionDetector = $collisionDetector;
        $this->queryBus = $queryBus;
    }

    public function __invoke(VehicleLandingCommand $command): void
    {

        $planet = $this->queryBus->ask(new FindPlanetByNameQuery($command->planetName()));
        $this->collisionDetector->validate($command->position(), $planet->obstaclesCoordinates());
        $this->repository->update(
            $command->id(),
            $command->position(),
            $command->orientation(),
            $command->planetName()
        );
    }
}
