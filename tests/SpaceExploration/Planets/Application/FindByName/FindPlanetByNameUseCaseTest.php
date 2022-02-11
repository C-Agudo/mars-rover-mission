<?php

namespace Tests\SpaceExploration\Planets\Application\FindByName;

use phpDocumentor\Reflection\DocBlock\Tags\Method;
use Src\SpaceExploration\Planets\Application\FindByName\FindPlanetByNameUseCase;
use Src\SpaceExploration\Planets\Domain\PlanetRepositoryInterface;
use Src\SpaceExploration\Planets\Infrastructure\Factories\PlanetFactory;
use Src\SpaceExploration\Planets\Infrastructure\Persistence\InMemoryPlanetRepository;
use Tests\CreatesApplication;
use Tests\TestCase;

class FindPlanetByNameUseCaseTest extends TestCase
{
    /** @test */
    /*
        public function it_should_find_planet_by_Name():void{

            $query = FindPlanetByNameQueryMotherObject::create();
            //$repository = $this->createMock(InMemoryPlanetRepository::class)
            $factory = new PlanetFactory();
            //new InMemoryPlanetRepository($factory);
            $repository = $this->createMock(InMemoryPlanetRepository::class);
            $repository->method('__construct')->with($factory);

            $repository->expects($this->once())
                ->method('searchByName')
                ->with($this->identicalTo($query->name()));

            //$this->assertSame($query->name(), $planet->name());
        }
      */
}
