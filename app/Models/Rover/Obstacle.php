<?php

namespace App\Models\Rover;

use App\Models\Coordinate\Coordinate;
use App\Models\Move\Direction;
use App\Models\Rover\Rover;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obstacle extends Model
{
    use HasFactory;

    public function __construct($x, $y) 
    {
         $this->x = $x;
         $this->y = $y;
    }

    public function getX()
    {
         return $this->x;
    }
    
    public function getY()
    {
         return $this->y;
    }
    public function getDetected()
    {
     return $this->detected;
    }
}
