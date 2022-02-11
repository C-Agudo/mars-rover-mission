<?php

namespace Src\SpaceExploration\Vehicles\Domain;

use Src\SpaceExploration\Vehicles\Domain\VehicleAggregate\Vehicle;

interface VehicleRepositoryInterface
{
    public function update(
        string $id,
        array $position,
        string $orientation,
        string $planetName
    ): void;

    public function findById(string $id): ?Vehicle;
}
