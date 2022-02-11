<?php

namespace Src\SpaceExploration\Vehicles\Domain\VehicleAggregate;

use Src\Shared\Domain\ValueObject\UuidValueObject;

class VehicleId extends UuidValueObject
{
    protected string $value;
    public function __construct(string $value)
    {
        $this->value = $value;
        parent::__construct($this->value);
    }
}
