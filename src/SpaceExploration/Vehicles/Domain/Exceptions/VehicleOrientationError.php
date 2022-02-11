<?php

namespace Src\SpaceExploration\Vehicles\Domain\Exceptions;

use Src\Shared\Domain\Exceptions\DomainError;

class VehicleOrientationError extends DomainError
{
    private string $vehicleOrientation;

    public function __construct(string $vehicleOrientation)
    {
        $this->vehicleOrientation = $vehicleOrientation;

        parent::__construct();
    }

    public function errorCode(): int
    {
        return 400;
    }

    public function errorAlias(): string
    {
        return 'vehicle_orientation_not_exist';
    }

    public function errorMessage(): string
    {
        return sprintf('The vehicle orientation <%s> does not exist', $this->vehicleOrientation);
    }
}
