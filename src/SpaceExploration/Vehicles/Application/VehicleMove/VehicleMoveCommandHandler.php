<?php

namespace Src\SpaceExploration\Vehicles\Application\VehicleMove;

use Src\Shared\Domain\Bus\Command\CommandHandlerInterface;

class VehicleMoveCommandHandler implements CommandHandlerInterface
{
    private VehicleMoveUseCase $useCase;

    public function __construct(VehicleMoveUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(VehicleMoveCommand $command)
    {
        $this->useCase->__invoke($command);
    }

}
