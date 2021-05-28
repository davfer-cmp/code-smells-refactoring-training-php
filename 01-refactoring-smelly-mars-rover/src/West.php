<?php


namespace App;


class West extends Direction
{
    public function __construct()
    {
        parent::__construct("W");
    }

    public function rotateLeft(): Direction
    {
        return Direction::create("S");
    }

    public function rotateRight(): Direction
    {
        return Direction::create("N");
    }

    public function move(Coordinates $coordinates, int $displacement): Coordinates
    {
        return $coordinates->moveX(-$displacement);
    }
}