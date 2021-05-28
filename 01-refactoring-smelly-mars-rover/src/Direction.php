<?php


namespace App;


abstract class Direction
{
    public static function create(string $direction): Direction
    {
        if ($direction === "N") {
            return self::north();
        } elseif ($direction === "S") {
            return self::south();
        } elseif ($direction === "W") {
            return self::west();
        }

        return self::east();
    }

    public static function north(): North
    {
        return new North();
    }
    public static function south(): South
    {
        return new South();
    }
    public static function west(): West
    {
        return new West();
    }
    public static function east(): East
    {
        return new East();
    }


    abstract public function rotateLeft(): Direction;
    abstract public function rotateRight(): Direction;
    abstract public function move(Coordinates $coordinates, int $displacement): Coordinates;
}