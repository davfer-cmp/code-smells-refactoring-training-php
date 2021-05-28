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

    public function isNorth(): bool
    {
        return $this->direction === "N";
    }

    public function isSouth(): bool
    {
        return $this->direction === "S";
    }

    public function isWest(): bool
    {
        return $this->direction === "W";
    }

    abstract public function rotateLeft(): Direction;
    abstract public function rotateRight(): Direction;
}