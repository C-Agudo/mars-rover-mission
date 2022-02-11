<?php

namespace Src\Shared\Infrastructure\Bus\Query;

use InvalidArgumentException;
use Src\Shared\Domain\Bus\Query\QueryBusInterface;
use Src\Shared\Domain\Bus\Query\QueryInterface;
use Src\Shared\Domain\Bus\Query\ResponseInterface;

class InMemoryQueryBus implements QueryBusInterface
{
    private array $handlers;

    public function __construct()
    {
        $this->handlers = [];
    }

    public function addHandler($queryName, $handler){
        $this->handlers[$queryName] = $handler;
    }

    public function ask(QueryInterface $query): ?ResponseInterface
    {

        $queryHandler = $this->handlers[get_class($query)];
        if($queryHandler === null){
            throw new InvalidArgumentException();
        }

        return $queryHandler->__invoke($query);
    }
}
