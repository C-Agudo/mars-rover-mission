<?php

namespace Src\SpaceExploration\Vehicles\Infrastructure\Factories;

use Src\SpaceExploration\Vehicles\Domain\VehicleAggregate\Vehicle;
use Src\SpaceExploration\Vehicles\Domain\VehicleAggregate\VehicleId;
use Src\SpaceExploration\Vehicles\Domain\VehicleAggregate\VehicleName;
use Src\SpaceExploration\Vehicles\Domain\VehicleAggregate\VehicleOrientation;
use Src\SpaceExploration\Vehicles\Domain\VehicleAggregate\VehiclePosition;
use Src\SpaceExploration\Vehicles\Domain\VehicleFactoryInterface;

class VehicleFactory implements VehicleFactoryInterface
{

    public function create(string $id, string $name, array $position, string $orientation): ?Vehicle
    {
        return new Vehicle(
          new VehicleId($id),
          new VehicleName($name),
          new VehiclePosition($position),
          new VehicleOrientation($orientation)
        );
    }
}
