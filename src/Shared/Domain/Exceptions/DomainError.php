<?php

namespace Src\Shared\Domain\Exceptions;

use DomainException;

abstract class DomainError extends DomainException
{
    public function __construct()
    {
        parent::__construct(
            $this->errorMessage(),
            $this->errorCode()
        );
    }

    abstract public function errorCode(): int;

    abstract public function errorAlias(): string;

    abstract protected function errorMessage(): string;
}
