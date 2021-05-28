<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private Direction $direction;
    private Coordinates $coordinates;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = Direction::create($direction);
        $this->coordinates = new Coordinates($x, $y);
    }

    public function receive(string $commandsSequence): void
    {
        $commandsSequenceLength = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLength; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            if ($command === "l") {
                $this->direction = $this->direction->rotateLeft();
            } elseif ($command === "r") {
                $this->direction = $this->direction->rotateRight();
            } else {
                // Displace Rover
                $displacement = -1;
                if ($command === "f") {
                    $displacement = 1;
                }

                $this->coordinates = $this->direction->move($this->coordinates, $displacement);
            }
        }
    }

}
