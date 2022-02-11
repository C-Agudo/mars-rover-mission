<?php

namespace Src\SpaceExploration\Vehicles\Domain\Exceptions;

use Src\Shared\Domain\Exceptions\DomainError;

class VehicleNotExistError extends DomainError
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
        parent::__construct();
    }

    public function errorCode(): int
    {
        return 404;
    }

    public function errorAlias(): string
    {
        return 'vehicle_not_found';
    }

    public function errorMessage(): string
    {
        return sprintf(
            'The course <%s> does not exist', $this->id
        );
    }
}
