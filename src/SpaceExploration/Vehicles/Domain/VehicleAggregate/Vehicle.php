<?php

namespace Src\SpaceExploration\Vehicles\Domain\VehicleAggregate;

use Src\Shared\Domain\Aggregate\AggregateRoot;
use Src\SpaceExploration\Vehicles\Domain\Exceptions\VehicleInstructionNotValid;
use Src\SpaceExploration\Vehicles\Domain\Exceptions\VehicleOrientationError;

class Vehicle extends AggregateRoot
{
    private VehicleId $vehicleId;
    private VehicleName $vehicleName;
    private VehiclePosition $vehiclePosition;
    private VehicleOrientation $vehicleOrientation;

    public function __construct(
        VehicleId $vehicleId,
        VehicleName $vehicleName,
        VehiclePosition $vehiclePosition,
        VehicleOrientation $vehicleOrientation
    )
    {
        $this->vehicleId = $vehicleId;
        $this->vehicleName =$vehicleName;
        $this->vehiclePosition = $vehiclePosition;
        $this->vehicleOrientation = $vehicleOrientation;
    }

    public static function create(
        VehicleId $vehicleId,
        VehicleName $vehicleName,
        VehiclePosition $vehiclePosition,
        VehicleOrientation $vehicleOrientation
    ): self
    {
        return new Vehicle(
            $vehicleId,
            $vehicleName,
            $vehiclePosition,
            $vehicleOrientation
        );
    }

    /**
     * @return VehicleId
     */
    public function id(): VehicleId
    {
        return $this->vehicleId;
    }

    /**
     * @return VehicleName
     */
    public function name(): VehicleName
    {
        return $this->vehicleName;
    }

    /**
     * @return VehiclePosition
     */
    public function position(): VehiclePosition
    {
        return $this->vehiclePosition;
    }

    /**
     * @return VehicleOrientation
     */
    public function orientation(): VehicleOrientation
    {
        return $this->vehicleOrientation;
    }

    public function move(string $instruction): array
    {
        $newPosition = $this->obtainNewPosition(
            $this->obtainMoveVector(
                $this->convertInstructionToVector($instruction),
                $this->convertOrientationToVector($this->orientation()->value())
            ),
            $this->position()->value()
        );

        $this->vehiclePosition = new VehiclePosition($newPosition);

        return $newPosition;
    }

    private function obtainNewPosition(array $moveVector, array $positionVector): array{
        return array(
            $moveVector[0] + $positionVector[0],
            $moveVector[1] + $positionVector[1]
        );
    }

    private function convertInstructionToVector(string $instruction):array{
        $instructionVector = array();
        if(strtoupper($instruction) === "F"){
            $instructionVector = VehiclePosition::F;
        }
        if(strtoupper($instruction) === "L"){
            $instructionVector = VehiclePosition::F;
        }
        if(strtoupper($instruction) === "R"){
            $instructionVector = VehiclePosition::R;
        }
        if(strtoupper($instruction) === "B"){
            $instructionVector = VehiclePosition::B;
        }
        if($instructionVector === []){
            throw new VehicleInstructionNotValid($instruction);
        }
        return $instructionVector;
    }

    private function convertOrientationToVector(string $value): array{

        $orientationVector = array();

        if(strtoupper($value) === "N"){
            $orientationVector = VehicleOrientation::N;
        }
        if(strtoupper($value) === "W"){
            $orientationVector = VehicleOrientation::W;
        }
        if(strtoupper($value) === "E"){
            $orientationVector = VehicleOrientation::E;
        }
        if(strtoupper($value) === "S"){
            $orientationVector = VehicleOrientation::S;
        }

        if($orientationVector === []) {
            throw new VehicleOrientationError($value);
        }

        return $orientationVector;
    }

    private function obtainMoveVector(array $instructionVector, array $orientationVector): array{
        return array(
            $instructionVector[0] * $orientationVector[0],
            $instructionVector[1] * $orientationVector[1]
        );
    }

}
