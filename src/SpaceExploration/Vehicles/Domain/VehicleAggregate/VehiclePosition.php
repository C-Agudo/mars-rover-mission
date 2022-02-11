<?php

namespace Src\SpaceExploration\Vehicles\Domain\VehicleAggregate;

use Src\Shared\Domain\ValueObject\ArrayValueObject;

class VehiclePosition extends ArrayValueObject
{
    public const F = array(1,1);
    public const L = array(-1,0);
    public const R = array(0,1);
    public const B = array(-1,-1);

    protected array $value;
    public function __construct(array $value)
    {
        $this->value = $value;
        parent::__construct($value);
    }

}
