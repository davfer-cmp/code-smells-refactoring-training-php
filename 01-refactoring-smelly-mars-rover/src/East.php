<?php


namespace App;


class East extends Direction
{
    public function __construct()
    {
        parent::__construct("E");
    }

    public function rotateLeft(): Direction
    {
        return Direction::create("N");
    }

    public function rotateRight(): Direction
    {
        return Direction::create("S");
    }
}