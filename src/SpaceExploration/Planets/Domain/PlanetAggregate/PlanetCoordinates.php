<?php

namespace Src\SpaceExploration\Planets\Domain\PlanetAggregate;

use Src\Shared\Domain\ValueObject\ArrayValueObject;

class PlanetCoordinates extends ArrayValueObject
{
    public function __construct(array $value)
    {
        parent::__construct($value);
    }
}
