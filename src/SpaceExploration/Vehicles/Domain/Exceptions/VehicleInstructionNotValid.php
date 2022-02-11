<?php

namespace Src\SpaceExploration\Vehicles\Domain\Exceptions;

use Src\Shared\Domain\Exceptions\DomainError;

class VehicleInstructionNotValid extends DomainError
{
    private string $instruction;

    public function __construct(string $instruction)
    {
        $this->instruction = $instruction;
        parent::__construct();
    }

    public function errorCode(): int
    {
        return 400;
    }

    public function errorAlias(): string
    {
        return 'vehicle_instruction_not_found';
    }

    public function errorMessage(): string
    {
        return sprintf(
            'The vehicle instruction <%s> is not valid', $this->instruction
        );
    }
}
