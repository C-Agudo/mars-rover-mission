<?php

namespace Src\SpaceExploration\Vehicles\Infrastructure\Persistence;

use Src\SpaceExploration\Vehicles\Domain\VehicleAggregate\Vehicle;
use Src\SpaceExploration\Vehicles\Domain\VehicleFactoryInterface;
use Src\SpaceExploration\Vehicles\Domain\VehicleRepositoryInterface;
use Src\SpaceExploration\Vehicles\Infrastructure\Persistence\Models\EloquentVehicleModel;

class EloquentVehicleRepository implements VehicleRepositoryInterface
{
    private VehicleFactoryInterface $factory;
    public function __construct(VehicleFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function update(string $id, array $position, string $orientation, string $planetName): void
    {
        EloquentVehicleModel::query()
            ->where('id', '=', $id)
            ->update([
                'position' => json_encode($position),
                'orientation' => $orientation,
                'planet_name' =>$planetName
            ]);

    }

    public function findById(string $id): ?Vehicle
    {
        $model = EloquentVehicleModel::query()->find($id);

        return $this->factory->create(
            $model['id'],
            $model['name'],
            json_decode($model['position'], true),
            $model['orientation']
        );
    }
}
