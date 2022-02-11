<?php

namespace Src\SpaceExploration\Vehicles\Application\VehicleMove;

use Src\Shared\Domain\Bus\Command\CommandInterface;

class VehicleMoveCommand implements CommandInterface
{
    private string $id;
    private array $instructions;
    private string $planetName;

    public function __construct(
        string $id,
        array $instructions,
        string $planetName
    )
    {
        $this->id = $id;
        $this->instructions = $instructions;
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
    public function instructions(): array
    {
        return $this->instructions;
    }

    /**
     * @return string
     */
    public function planetName(): string
    {
        return $this->planetName;
    }
}
