<?php

namespace Src\SpaceExploration\Vehicles\Application\VehicleLanding;

use Src\Shared\Domain\Bus\Command\CommandInterface;

class VehicleLandingCommand implements CommandInterface
{
    private string $id;
    private array $position;
    private string $orientation;
    private string $planetName;
    /**
     * @param mixed $id
     * @param mixed $position
     * @param mixed $orientation
     */
    public function __construct(
        string $id,
        array $position,
        string $orientation,
        string $planetName
    )
    {
        $this->id = $id;
        $this->position = $position;
        $this->orientation = $orientation;
        $this->planetName = $planetName;
    }

    /**
     * @return mixed|string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return array|mixed
     */
    public function position()
    {
        return $this->position;
    }

    /**
     * @return mixed|string
     */
    public function orientation()
    {
        return $this->orientation;
    }

    /**
     * @return string
     */
    public function planetName(): string
    {
        return $this->planetName;
    }
}
