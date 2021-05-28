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

    public function moveX($displacement): void
    {
        $this->x = $this->x + $displacement;
    }

    public function moveY($displacement): void
    {
        $this->y = $this->y + $displacement;
    }

}