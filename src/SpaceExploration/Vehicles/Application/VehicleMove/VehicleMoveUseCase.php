<?php

namespace Src\SpaceExploration\Vehicles\Application\VehicleMove;

use Src\Shared\Domain\Bus\Query\QueryBusInterface;
use Src\SpaceExploration\Planets\Application\FindByName\FindPlanetByNameQuery;
use Src\SpaceExploration\Vehicles\Domain\Validators\CollisionDetectorValidator;
use Src\SpaceExploration\Vehicles\Domain\Validators\VehicleFinderValidator;
use Src\SpaceExploration\Vehicles\Domain\VehicleRepositoryInterface;

class VehicleMoveUseCase
{
    private VehicleRepositoryInterface $repository;
    private CollisionDetectorValidator $collisionDetector;
    private VehicleFinderValidator $vehicleFinder;
    private QueryBusInterface $queryBus;

    public function __construct(
        VehicleRepositoryInterface $repository,
        CollisionDetectorValidator $collisionDetector,
        VehicleFinderValidator $vehicleFinder,
        QueryBusInterface $queryBus
    )
    {
        $this->repository = $repository;
        $this->collisionDetector = $collisionDetector;
        $this->vehicleFinder = $vehicleFinder;
        $this->queryBus = $queryBus;
    }

    public function __invoke(VehicleMoveCommand $command): void
    {
        $vehicle = $this->repository->findById($command->id());
        $this->vehicleFinder->validate($vehicle, $command->id());
        $planet = $this->queryBus->ask(new FindPlanetByNameQuery($command->planetName()));

        foreach ($command->instructions() as $instruction){
            $newPosition = $vehicle->move($instruction);
            $this->collisionDetector->validate($newPosition, $planet->obstaclesCoordinates());
        }

        $this->repository->update(
            $command->id(),
            $vehicle->position()->value(),
            $vehicle->orientation()->value(),
            $command->planetName()
        );
    }

}
