<?php

namespace Src\SpaceExploration\Planets\Domain\PlanetAggregate;

use Src\Shared\Domain\ValueObject\UuidValueObject;

class PlanetId extends UuidValueObject
{
    protected string $value;
    public function __construct(string $value)
    {
        $this->value = $value;
        parent::__construct($this->value);
    }
}
