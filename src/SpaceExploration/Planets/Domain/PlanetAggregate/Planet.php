<?php

namespace Src\SpaceExploration\Planets\Domain\PlanetAggregate;

use Src\Shared\Domain\Aggregate\AggregateRoot;

class Planet extends AggregateRoot
{
    private PlanetId $planetId;
    private PlanetName $planetName;
    private PlanetCoordinates $planetCoordinates;
    private PlanetObstaclesCoordinates $planetObstaclesCoordinates;

    public function __construct(
        PlanetId $planetId,
        PlanetName $planetName,
        PlanetCoordinates $planetCoordinates,
        PlanetObstaclesCoordinates $planetObstaclesCoordinates
    )
    {
        $this->planetId = $planetId;
        $this->planetName = $planetName;
        $this->planetCoordinates = $planetCoordinates;
        $this->planetObstaclesCoordinates = $planetObstaclesCoordinates;
    }

    public static function create(
        PlanetId $planetId,
        PlanetName $planetName,
        PlanetCoordinates $planetCoordinates,
        PlanetObstaclesCoordinates $planetObstaclesCoordinates
    ): self
    {
        return new Planet(
            $planetId,
            $planetName,
            $planetCoordinates,
            $planetObstaclesCoordinates
        );
    }

    /**
     * @return PlanetId
     */
    public function id(): PlanetId
    {
        return $this->planetId;
    }

    /**
     * @return PlanetName
     */
    public function name(): PlanetName
    {
        return $this->planetName;
    }

    /**
     * @return PlanetCoordinates
     */
    public function coordinates(): PlanetCoordinates
    {
        return $this->planetCoordinates;
    }

    /**
     * @return PlanetObstaclesCoordinates
     */
    public function obstaclesCoordinates(): PlanetObstaclesCoordinates
    {
        return $this->planetObstaclesCoordinates;
    }
}
