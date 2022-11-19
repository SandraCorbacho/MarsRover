<?php

namespace App\Models\Coordinate;

class Coordinate
{
    private $x;

    public function getX(): int
    {
        return $this->x;
    }

    private $y;

    public function getY(): int
    {
        return $this->y;
    }

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}