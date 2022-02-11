<?php

namespace Src\Shared\Domain\Bus\Command;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): void;

}
