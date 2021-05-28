<?php

declare(strict_types=1);

namespace App;

class Rover
{
    const DISPLACEMENT = 1;
    const COMMAND_LEFT = "l";
    const COMMAND_RIGHT = "r";
    const COMMAND_FORWARD = "f";

    private Direction $direction;
    private Coordinates $coordinates;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = Direction::create($direction);
        $this->coordinates = new Coordinates($x, $y);
    }

    public function receive(string $commandsSequence): void
    {
        $commands = $this->extractCommands($commandsSequence);
        $this->executeCommands($commands);
    }

    public function extractCommands(string $commandsSequence): array
    {
        $commands = [];
        $commandsSequenceLength = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLength; ++$i) {
            $commands[] = substr($commandsSequence, $i, 1);
        }

        return $commands;
    }

    private function executeCommands(array $commands): void
    {
        foreach ($commands as $command) {
            $this->execute($command);
        }
    }

    public function execute(string $command): void
    {
        if ($command === self::COMMAND_LEFT) {
            $this->direction = $this->direction->rotateLeft();
        } elseif ($command === self::COMMAND_RIGHT) {
            $this->direction = $this->direction->rotateRight();
        } elseif ($command === self::COMMAND_FORWARD) {
            $this->coordinates = $this->direction->move($this->coordinates, self::DISPLACEMENT);
        } else {
            $this->coordinates = $this->direction->move($this->coordinates, -self::DISPLACEMENT);
        }
    }
}
