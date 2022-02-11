<?php

namespace Src\SpaceExploration\Planets\Application\FindByName;

use Src\Shared\Domain\Bus\Query\QueryInterface;

class FindPlanetByNameQuery implements QueryInterface
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
    /*
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

}
