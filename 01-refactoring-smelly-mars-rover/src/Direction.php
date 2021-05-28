<?php


namespace App;


class Direction
{
    private string $direction;

    public function __construct(string $direction)
    {
        $this->direction = $direction;
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


}