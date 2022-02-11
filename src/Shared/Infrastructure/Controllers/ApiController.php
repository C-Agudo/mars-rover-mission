<?php

namespace Src\Shared\Infrastructure\Controllers;

use Src\Shared\Domain\Bus\Command\CommandBusInterface;
use Src\Shared\Domain\Bus\Command\CommandInterface;
use Src\Shared\Domain\Bus\Query\QueryBusInterface;
use Src\Shared\Domain\Bus\Query\QueryInterface;
use Src\Shared\Domain\Bus\Query\ResponseInterface;

abstract class ApiController
{
    private QueryBusInterface $queryBus;
    private CommandBusInterface $commandBus;

    public function __construct(
        QueryBusInterface $queryBus,
        CommandBusInterface $commandBus
    )
    {
        $this->queryBus = $queryBus;
        $this->commandBus = $commandBus;
    }

    protected function ask(QueryInterface $query): ?ResponseInterface{
        return $this->queryBus->ask($query);
    }

    protected function dispatch(CommandInterface $command): void{

        $this->commandBus->dispatch($command);
    }
}

