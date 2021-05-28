<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private Direction $direction;
    private Coordinates $coordinates;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->setDirection($direction);
        $this->setCoordinates($x, $y);
    }

    public function receive(string $commandsSequence): void
    {
        $commandsSequenceLength = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLength; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            if ($command === "l") {
                // Rotate Rover
                if ($this->facesNorth()) {
                    $this->setDirection("W");
                } else if ($this->facesSouth()) {
                    $this->setDirection("E");
                } else if ($this->facesWest()) {
                    $this->setDirection("S");
                } else {
                    $this->setDirection("N");
                }
            } elseif ($command === "r") {
                // Rotate Rover
                if ($this->facesNorth()) {
                    $this->setDirection("E");
                } else if ($this->facesSouth()) {
                    $this->setDirection("W");
                } else if ($this->facesWest()) {
                    $this->setDirection("N");
                } else {
                    $this->setDirection("S");
                }
            } else {
                // Displace Rover
                $displacement = -1;
                if ($command === "f") {
                    $displacement = 1;
                }

                if ($this->facesNorth()) {
                    $this->setCoordinates($this->coordinates->getX(), $this->coordinates->getY() + $displacement);
                } else if ($this->facesSouth()) {
                    $this->setCoordinates($this->coordinates->getX(), $this->coordinates->getY() - $displacement);
                } else if ($this->facesWest()) {
                    $this->setCoordinates($this->coordinates->getX() - $displacement, $this->coordinates->getY());
                } else {
                    $this->setCoordinates($this->coordinates->getX() + $displacement, $this->coordinates->getY());
                }
            }
        }
    }

    public function setDirection(string $direction): void
    {
        $this->direction = new Direction($direction);
    }

    private function facesNorth(): bool
    {
        return $this->direction->isNorth();
    }

    private function facesSouth(): bool
    {
        return $this->direction->isSouth();
    }

    private function facesWest(): bool
    {
        return $this->direction->isWest();
    }

    private function setCoordinates(int $x, int $y): void
    {

        $this->coordinates = new Coordinates($x, $y);
    }

}
