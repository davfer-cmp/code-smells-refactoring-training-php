<?php

namespace App;


class Coordinates
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function moveX($displacement): Coordinates
    {
        return new Coordinates($this->x + $displacement, $this->y);
    }

    public function moveY($displacement): Coordinates
    {
        return new Coordinates($this->x, $this->y + $displacement);
    }

}