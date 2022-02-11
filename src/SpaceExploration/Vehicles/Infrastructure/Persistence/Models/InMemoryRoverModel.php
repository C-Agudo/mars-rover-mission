<?php

namespace Src\SpaceExploration\Vehicles\Infrastructure\Persistence\Models;

class InMemoryRoverModel
{
    private string $id;
    private ?array $position;
    private ?string $orientation;
    private string $name;
    private ?string $planetName;

    public function __construct(
        array $position = null,
        string $orientation = null,
        string $planetName = null
    )
    {
        $this->id = "9d35e3d5-7029-4a8d-a76e-a515982b0083";
        $this->name = "Rover";
        $this->position = $position;
        $this->orientation = $orientation;
        $this->planetName = $planetName;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function position(): ?array
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function orientation(): ?string
    {
        return $this->orientation;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function planetName(): ?string
    {
        return $this->planetName;
    }

    /**
     * @param array|mixed $position
     */
    public function setPosition($position): void
    {
        $this->position = $position;
    }

    /**
     * @param mixed|string $orientation
     */
    public function setOrientation($orientation): void
    {
        $this->orientation = $orientation;
    }

    /**
     * @param string|null $planetName
     */
    public function setPlanetName(?string $planetName): void
    {
        $this->planetName = $planetName;
    }


}
