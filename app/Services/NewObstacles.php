<?php

namespace app\Services;
use App\Models\Rover\Rover; 
use App\Models\Move\Direction;
use App\Models\Rover\Obstacle; 

class NewObstacles
{
    /**
     * @param Rover $rover
     * @return Obstacle[]
     */
    // 
    public function NewObstacles(Rover $rover): array {
        
        $numObstacles = config('global.num_obstacles');
        $obstacles = [];
        for($i=0; $i <= $numObstacles; $i++ ){
            $x = mt_rand(0,config('global.world_size'));
            $y = mt_rand(0,config('global.world_size'));
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