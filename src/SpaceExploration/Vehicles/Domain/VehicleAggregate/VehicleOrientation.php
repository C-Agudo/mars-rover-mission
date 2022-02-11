<?php

namespace Src\SpaceExploration\Vehicles\Domain\VehicleAggregate;

use Src\Shared\Domain\ValueObject\StringValueObject;
use Src\SpaceExploration\Vehicles\Domain\Exceptions\VehicleOrientationError;

class VehicleOrientation extends StringValueObject
{
    public const N = array(1,1);
    public const W = array(-1,0);
    public const E = array(0,1);
    public const S = array(-1,-1);

    protected string $value;
    public function __construct(string $value)
    {
        $this->value = $value;
        parent::__construct($value);
    }

}
