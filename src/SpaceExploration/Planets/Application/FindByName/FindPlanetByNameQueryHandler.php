<?php

namespace Src\SpaceExploration\Planets\Application\FindByName;

use Src\Shared\Domain\Bus\Query\QueryHandlerInterface;
use Src\SpaceExploration\Planets\Application\PlanetResponse;

class FindPlanetByNameQueryHandler implements QueryHandlerInterface
{
    private FindPlanetByNameUseCase $useCase;

    public function __construct(FindPlanetByNameUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(FindPlanetByNameQuery $query): PlanetResponse
    {
        return $this->useCase->__invoke($query);
    }
}
