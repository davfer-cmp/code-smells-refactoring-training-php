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
        foreach ($this->parse($commandsSequence) as $command) {
            $this->execute($command);
        }
    }

    public function parse(string $commandsSequence): array
    {
        $commands = [];
        $commandsSequenceLength = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLength; ++$i) {
            $commands[] = substr($commandsSequence, $i, 1);
        }

        return $commands;
    }

    public function execute(string $command): void
    {
        if ($command === "l") {
            $this->direction = $this->direction->rotateLeft();
        } elseif ($command === "r") {
            $this->direction = $this->direction->rotateRight();
        } elseif ($command === "f") {
            $this->coordinates = $this->direction->move($this->coordinates, 1);
        } else {
            $this->coordinates = $this->direction->move($this->coordinates, -1);
        }
    }
}
