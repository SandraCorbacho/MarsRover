<?php

namespace app\Services;
use App\Models\Rover\Rover; 
use App\Models\Move\Direction;
use App\Models\Rover\Obstacle; 

class NewObstacles
{

    public function NewObstacles(Rover $rover) {
        
        $numObstacles = 5;
        $obstacles = [];
        for($i=0; $i <= $numObstacles; $i++ ){
            $x = mt_rand(0,190);
            $y = mt_rand(0,190);
            $obstacle = new Obstacle($x,$y);
            if($rover->getX() == $obstacle->getX() && $rover->getY() == $obstacle->getY()){
                $i--;
            }else{
                $obstacles [] = $obstacle;
            }
        }
        return $obstacles;
    }
}