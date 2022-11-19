<?php

namespace App\Models\Move;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;
    const directions = [1 => 'N', 2 => 'E', 3 => 'S', 4 => 'O'];

   public function setDirection($Direction)
   {
        $this->direction = $Direction;
   }

   public function getDirection($Direction)
   {
        return $this->direction;
   }
   public function __construct($Direction) 
   {
        $this->direction = $Direction;
   }
   public function changeDirection($currentDirection, $command)
   {
    $direction = array_search($currentDirection, self::directions);
        if($command == 'L'){
            if($direction == 1){
                $direction = 4;
            }else{
                $direction--;
            }
        }
        if ($command == 'R'){
            if($direction == 4){
                $direction = 1;
            }else{
                $direction++;
            }
        }
        return self::directions[$direction];
   }
}
