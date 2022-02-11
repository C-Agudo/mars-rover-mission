<?php

namespace Src\SpaceExploration\Planets\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Shared\Infrastructure\Controllers\ApiController;
use Src\SpaceExploration\Planets\Application\FindByName\FindPlanetByNameQuery;


class PlanetGetController extends ApiController
{
    public function __invoke(string $name): JsonResponse
    {

        $planet = $this->ask(
            new FindPlanetByNameQuery($name)
        );
        return response()->json([
            'id' => $planet->id(),
            'name' => $planet->name(),
            'coordinates' => $planet->coordinates(),
            'obstacles_coordinates' => $planet->obstaclesCoordinates()
        ]);

    }
}
