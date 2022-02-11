<?php

namespace Src\SpaceExploration\Vehicles\Domain\Exceptions;

use Src\Shared\Domain\Exceptions\DomainError;

class VehicleCollisionError extends DomainError
{
    private array $nextPosition;

    public function __construct(array $nextPosition)
    {
        $this->nextPosition = $nextPosition;
        parent::__construct();
    }

    public function errorCode(): int
    {
        return 400;
    }

    public function errorAlias(): string
    {
        return 'vehicle_collision';
    }

    public function errorMessage(): string
    {
        return sprintf(
            'Cannot move to coordinate <%s> because it is occupied by an obstacle',
            json_encode($this->nextPosition)
        );
    }
}
