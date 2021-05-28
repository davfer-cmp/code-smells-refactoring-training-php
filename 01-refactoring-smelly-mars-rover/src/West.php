<?php


namespace App;


class West extends Direction
{

    public function rotateLeft(): Direction
    {
        return self::south();
    }

    public function rotateRight(): Direction
    {
        return self::north();
    }

    public function move(Coordinates $coordinates, int $displacement): Coordinates
    {
        return $coordinates->moveX(-$displacement);
    }
}