<?php

namespace Tests\SpaceExploration\Vehicles\Application\VehicleLanding;

use Src\Shared\Domain\Bus\Query\QueryBusInterface;
use Src\Shared\Infrastructure\Bus\Query\InMemoryQueryBus;
use Src\SpaceExploration\Planets\Application\FindByName\FindPlanetByNameQuery;
use Src\SpaceExploration\Planets\Application\PlanetResponse;
use Src\SpaceExploration\Planets\Infrastructure\Persistence\Models\InMemoryMarsModel;
use Src\SpaceExploration\Vehicles\Application\VehicleLanding\VehicleLandingCommand;
use Src\SpaceExploration\Vehicles\Application\VehicleLanding\VehicleLandingUseCase;
use Src\SpaceExploration\Vehicles\Domain\Exceptions\VehicleCollisionError;
use Src\SpaceExploration\Vehicles\Domain\Validators\CollisionDetectorValidator;
use Src\SpaceExploration\Vehicles\Domain\VehicleRepositoryInterface;
use Src\SpaceExploration\Vehicles\Infrastructure\Persistence\EloquentVehicleRepository;
use Src\SpaceExploration\Vehicles\Infrastructure\Persistence\Models\EloquentVehicleModel;
use Tests\SpaceExploration\Planets\Application\FindByName\PlanetResponseObjectMother;
use Tests\TestCase;

class VehicleLandingUseCaseTest extends TestCase
{
    private VehicleRepositoryInterface $repository;
    private CollisionDetectorValidator $validator;
    private QueryBusInterface $queryBus;
    private PlanetResponse $planetResponse;
    private VehicleLandingUseCase $landingUseCase;

    protected function setUp(): void
    {
        $this->repository = $this->CreateMock(VehicleRepositoryInterface::class);
        $this->validator = new CollisionDetectorValidator();
        $this->queryBus = $this->createMock(QueryBusInterface::class);
        $this->planetResponse = PlanetResponseObjectMother::create(
            InMemoryMarsModel::ID,
            InMemoryMarsModel::NAME,
            InMemoryMarsModel::COORDINATES,
            InMemoryMarsModel::OBSTACLES_COORDINATES
        );
        $this->landingUseCase = new VehicleLandingUseCase(
            $this->repository, $this->validator, $this->queryBus
        );
        parent::setUp();
    }

    /** @test */
    public function it_should_update_position_and_orientation(){

        $command = VehicleLandingCommandMother::create(
            "9d35e3d5-7029-4a8d-a76e-a515982b0083",
            [9,9],
            "N",
            "Mars");

        $this->repository->expects($this->once())->method('update');
        $this->queryBus->expects($this->once())->method('ask')
            ->with(new FindPlanetByNameQuery($command->planetName()))
            ->willReturn($this->planetResponse);

        $this->landingUseCase->__invoke($command);

        //$this->assertEquals($command->id(), $this->planetResponse->id());
    }

    /** @test */
    public function it_should_throw_an_exception_when_position_is_occupied_by_obstacle(){

        $this->expectException(VehicleCollisionError::class);

        $command = VehicleLandingCommandMother::create(
            "9d35e3d5-7029-4a8d-a76e-a515982b0083",
            [10,10],
            "N",
            "Mars");

        $this->queryBus->expects($this->once())->method('ask')
            ->with(new FindPlanetByNameQuery($command->planetName()))
            ->willReturn($this->planetResponse);

        $this->landingUseCase->__invoke($command);

    }

}
