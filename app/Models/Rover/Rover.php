<?php

namespace App\Models\Rover;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rover extends Model
{
    use HasFactory;
     private $x;
     private $y;
     private $direction;

    public function __construct(int $x = 100, int $y = 100, string $direction = null) 
    {
         $this->x = $x;
         $this->y = $y;
         $this->direction = $direction;
    }

    
    public function setDirection(string $direction)
    {
         $this->direction = $direction;
    }
 
    public function getDirection(): string
    {
         return $this->direction;
    }

    public function setX(int $x)
    {
         $this->x = $x;
    }
 
    public function getX(): int
    {
         return $this->x;
    }
    public function setY(int $y)
    {
         $this->y = $y;
    }
 
    public function getY(): int
    {
         return $this->y;
    }
}
