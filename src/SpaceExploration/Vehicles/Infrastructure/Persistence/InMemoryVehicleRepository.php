<?php

namespace Src\SpaceExploration\Vehicles\Infrastructure\Persistence;

use Src\SpaceExploration\Vehicles\Domain\VehicleAggregate\Vehicle;
use Src\SpaceExploration\Vehicles\Domain\VehicleFactoryInterface;
use Src\SpaceExploration\Vehicles\Domain\VehicleRepositoryInterface;
use Src\SpaceExploration\Vehicles\Infrastructure\Persistence\Models\InMemoryRoverModel;

class InMemoryVehicleRepository implements VehicleRepositoryInterface
{
    private InMemoryRoverModel $roverModel;
    private VehicleFactoryInterface $factory;

    public function __construct(
        InMemoryRoverModel $roverModel,
        VehicleFactoryInterface $factory
    )
    {
        $this->roverModel = $roverModel;
        $this->factory = $factory;
    }

    public function update(
        string $id,
        array $position,
        string $orientation,
        string $planetName
    ): void
    {
        if($this->roverModel->id() === $id){
            $this->roverModel->setPosition($position);
            $this->roverModel->setOrientation($orientation);
            $this->roverModel->setPlanetName($planetName);
        }
    }

    public function findById(string $id): ?Vehicle{
        if($this->roverModel->id() === $id){
            $this->factory->create(
                $this->roverModel->id(),
                $this->roverModel->name(),
                $this->roverModel->position(),
                $this->roverModel->orientation()
            );
        }
        return null;
    }
}
