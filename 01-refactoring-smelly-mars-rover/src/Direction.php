<?php


namespace App;


abstract class Direction
{
    private string $direction;

    public function __construct(string $direction)
    {
        $this->direction = $direction;
    }

    public static function create(string $direction): Direction
    {
        if ($direction === "N") {
            return new North();
        } elseif ($direction === "S") {
            return new South();
        } elseif ($direction === "W") {
            return new West();
        }

        return new East();
    }

    abstract public function rotateLeft(): Direction;
    abstract public function rotateRight(): Direction;
    abstract public function move(Coordinates $coordinates, int $displacement): Coordinates;
}