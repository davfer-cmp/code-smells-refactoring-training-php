<?php


namespace App;


class North extends Direction
{
    public function __construct()
    {
        parent::__construct("N");
    }

    public function rotateLeft(): Direction
    {
        return Direction::create("W");
    }

    public function rotateRight(): Direction
    {
        return Direction::create("E");
    }
}