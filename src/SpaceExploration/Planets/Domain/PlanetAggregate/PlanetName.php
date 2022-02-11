<?php

namespace Src\SpaceExploration\Planets\Domain\PlanetAggregate;

use Src\Shared\Domain\ValueObject\StringValueObject;

class PlanetName extends StringValueObject
{
    protected string $value;
    public function __construct(string $value)
    {
        $this->value = $value;
        parent::__construct($this->value);
    }
}
