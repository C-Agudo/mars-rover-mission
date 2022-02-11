<?php

namespace Src\SpaceExploration\Vehicles\Domain;

use Src\SpaceExploration\Vehicles\Domain\VehicleAggregate\Vehicle;

interface VehicleFactoryInterface
{
    public function create(
        string $id,
        string $name,
        array $position,
        string $orientation
    ): ?Vehicle;
}
