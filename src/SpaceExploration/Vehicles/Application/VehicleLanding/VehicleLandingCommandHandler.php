<?php

namespace Src\SpaceExploration\Vehicles\Application\VehicleLanding;

use Src\Shared\Domain\Bus\Command\CommandHandlerInterface;

class VehicleLandingCommandHandler implements CommandHandlerInterface
{
    private VehicleLandingUseCase $useCase;

    public function __construct(VehicleLandingUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(VehicleLandingCommand $command): void
    {
        $this->useCase->__invoke($command);
    }
}
