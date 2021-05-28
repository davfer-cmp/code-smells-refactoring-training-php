<?php


namespace App;


class South extends Direction
{

    public function rotateLeft(): Direction
    {
        return self::east();
    }

    public function rotateRight(): Direction
    {
        return self::west();
    }

    public function move(Coordinates $coordinates, int $displacement): Coordinates
    {
        return $coordinates->moveY(-$displacement);
    }
}