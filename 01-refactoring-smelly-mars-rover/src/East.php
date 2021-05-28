<?php


namespace App;


class East extends Direction
{

    public function rotateLeft(): Direction
    {
        return self::north();
    }

    public function rotateRight(): Direction
    {
        return self::south();
    }

    public function move(Coordinates $coordinates, int $displacement): Coordinates
    {
        return $coordinates->moveX($displacement);
    }
}