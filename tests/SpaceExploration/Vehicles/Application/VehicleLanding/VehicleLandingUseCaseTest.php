<?php

namespace Tests\SpaceExploration\Vehicles\Application\VehicleLanding;

use Src\Shared\Infrastructure\Bus\Query\InMemoryQueryBus;
use Src\SpaceExploration\Planets\Application\PlanetResponse;
use Src\SpaceExploration\Planets\Infrastructure\Persistence\Models\InMemoryMarsModel;
use Src\SpaceExploration\Vehicles\Application\VehicleLanding\VehicleLandingCommand;
use Src\SpaceExploration\Vehicles\Application\VehicleLanding\VehicleLandingUseCase;
use Src\SpaceExploration\Vehicles\Domain\Validators\CollisionDetectorValidator;
use Src\SpaceExploration\Vehicles\Infrastructure\Persistence\EloquentVehicleRepository;
use Src\SpaceExploration\Vehicles\Infrastructure\Persistence\Models\EloquentVehicleModel;
use Tests\SpaceExploration\Planets\Application\FindByName\PlanetResponseObjectMother;
use Tests\TestCase;

class VehicleLandingUseCaseTest extends TestCase
{
    /** @test */
    public function it_should_update_position_and_orientation(){

        $repository = $this->getMockBuilder(EloquentVehicleRepository::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['update', 'findById'])->getMock();
        $validator = $this->createMock(CollisionDetectorValidator::class);
        $queryBus = $this->createMock(InMemoryQueryBus::class);
            $queryBus->method('ask')->willReturn(
                PlanetResponseObjectMother::create(
                    InMemoryMarsModel::ID,
                    InMemoryMarsModel::NAME,
                    InMemoryMarsModel::COORDINATES,
                    InMemoryMarsModel::OBSTACLES_COORDINATES
                )
            );
        $landingUseCase = new VehicleLandingUseCase(
            $repository, $validator, $queryBus
        );
        $command = new VehicleLandingCommand(
            "9d35e3d5-7029-4a8d-a76e-a515982b0083",
            [10,10],
            "N",
            "Mars"
        );

        $landingUseCase->__invoke($command);

        $repository->expects($this->once()->verify())->method('update');

    }
}
