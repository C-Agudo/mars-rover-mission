<?php

namespace Src\Shared\Domain\ValueObject;

abstract class StringValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string{
        return $this->value;
    }
}
