<?php

namespace Src\Shared\Infrastructure\Bus\Command;

use InvalidArgumentException;
use Src\Shared\Domain\Bus\Command\CommandBusInterface;
use Src\Shared\Domain\Bus\Command\CommandInterface;

class InMemoryCommandBus implements CommandBusInterface
{
    private array $handlers;

    public function __construct()
    {
        $this->handlers = [];
    }

    public function addHandler($commandName, $handler){
        $this->handlers[$commandName] = $handler;
    }

    public function dispatch(CommandInterface $command): void
    {
        $commandHandler = $this->handlers[get_class($command)];

        if($commandHandler === null){
            throw new InvalidArgumentException();
        }

        $commandHandler->__invoke($command);
    }
}
