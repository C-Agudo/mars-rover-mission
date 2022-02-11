<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Shared\Domain\Bus\Command\CommandBusInterface;
use Src\Shared\Domain\Bus\Query\QueryBusInterface;
use Src\Shared\Infrastructure\Bus\Command\InMemoryCommandBus;
use Src\Shared\Infrastructure\Bus\Query\InMemoryQueryBus;
use Src\SpaceExploration\Planets\Application\FindByName\FindPlanetByNameQuery;
use Src\SpaceExploration\Planets\Application\FindByName\FindPlanetByNameQueryHandler;
use Src\SpaceExploration\Planets\Domain\PlanetFactoryInterface;
use Src\SpaceExploration\Planets\Domain\PlanetRepositoryInterface;
use Src\SpaceExploration\Planets\Infrastructure\Factories\PlanetFactory;
use Src\SpaceExploration\Planets\Infrastructure\Persistence\InMemoryPlanetRepository;
use Src\SpaceExploration\Vehicles\Application\VehicleLanding\VehicleLandingCommand;
use Src\SpaceExploration\Vehicles\Application\VehicleLanding\VehicleLandingCommandHandler;
use Src\SpaceExploration\Vehicles\Application\VehicleMove\VehicleMoveCommand;
use Src\SpaceExploration\Vehicles\Application\VehicleMove\VehicleMoveCommandHandler;
use Src\SpaceExploration\Vehicles\Domain\VehicleFactoryInterface;
use Src\SpaceExploration\Vehicles\Domain\VehicleRepositoryInterface;
use Src\SpaceExploration\Vehicles\Infrastructure\Factories\VehicleFactory;
use Src\SpaceExploration\Vehicles\Infrastructure\Persistence\EloquentVehicleRepository;
use Src\SpaceExploration\Vehicles\Infrastructure\Persistence\InMemoryVehicleRepository;
use Src\SpaceExploration\Vehicles\Infrastructure\Persistence\Models\InMemoryRoverModel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(QueryBusInterface::class, function ($app) {
            $queryBus = new InMemoryQueryBus();
            $queryBus->addHandler(FindPlanetByNameQuery::class, $this->app->make(FindPlanetByNameQueryHandler::class));
            return $queryBus;
        });

        $this->app->singleton(CommandBusInterface::class, function ($app) {
            $commandBus = new InMemoryCommandBus();
            $commandBus->addHandler(VehicleLandingCommand::class, $this->app->make(VehicleLandingCommandHandler::class));
            $commandBus->addHandler(VehicleMoveCommand::class, $this->app->make(VehicleMoveCommandHandler::class));
            //$commandBus->addHandler();
            return $commandBus;
        });

        // Planets
        $this->app->bind(PlanetFactoryInterface::class, PlanetFactory::class);
        $this->app->bind(PlanetRepositoryInterface::class, InMemoryPlanetRepository::class);

        //Vehicles
        $this->app->singleton(InMemoryRoverModel::class);
        $this->app->bind(VehicleFactoryInterface::class, VehicleFactory::class);
        $this->app->bind(VehicleRepositoryInterface::class, EloquentVehicleRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
