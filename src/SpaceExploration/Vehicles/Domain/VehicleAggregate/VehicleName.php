<?php

namespace Src\SpaceExploration\Vehicles\Domain\VehicleAggregate;

use Src\Shared\Domain\ValueObject\StringValueObject;

class VehicleName extends StringValueObject
{
    protected string $value;
    public function __construct(string $value)
    {
        $this->value = $value;
        parent::__construct($this->value);
    }
}
