<?php

namespace App\Models\Rover;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rover extends Model
{
    use HasFactory;

    public function __construct($x = 100, $y = 100, $direction = null) 
    {
         $this->x = $x;
         $this->y = $y;
         $this->direction = $direction;
    }

    

    public function setDirection($Direction)
    {
         $this->direction = $Direction;
    }
 
    public function getDirection()
    {
         return $this->direction;
    }

    public function setX($x)
    {
         $this->x = (int) $x;
    }
 
    public function getX()
    {
         return $this->x;
    }
    public function setY($y)
    {
         $this->y = (int) $y;
    }
 
    public function getY()
    {
         return $this->y;
    }
}
