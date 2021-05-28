<?php


namespace App;


class North extends Direction
{

    public function rotateLeft(): Direction
    {
        return self::west();
    }

    public function rotateRight(): Direction
    {
        return self::east();
    }

    public function move(Coordinates $coordinates, int $displacement): Coordinates
    {
        return $coordinates->moveY($displacement);
    }
}