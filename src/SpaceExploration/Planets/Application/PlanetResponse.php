<?php

namespace Src\SpaceExploration\Planets\Application;

use Src\Shared\Domain\Bus\Query\ResponseInterface;

class PlanetResponse implements ResponseInterface
{
    private string $id;
    private string $name;
    private array $coordinates;
    private array $obstaclesCoordinates;

    public function __construct(string $id, string $name, array $coordinates, array $obstaclesCoordinates)
    {
        $this->id = $id;
        $this->name = $name;
        $this->coordinates = $coordinates;
        $this->obstaclesCoordinates = $obstaclesCoordinates;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function coordinates(): array
    {
        return $this->coordinates;
    }

    /**
     * @return array
     */
    public function obstaclesCoordinates(): array
    {
        return $this->obstaclesCoordinates;
    }



}
