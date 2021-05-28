<?php


namespace App;


class South extends Direction
{

    public function __construct()
    {
        parent::__construct("S");
    }

    public function rotateLeft(): Direction
    {
        return Direction::create("E");
    }

    public function rotateRight(): Direction
    {
        return Direction::create("W");
    }
}