<?php

namespace app\Services;
use App\Models\Rover\Rover; 
use App\Models\Move\Direction;
use Session;

class NewPosition
{

public function NewPosition( Rover $rover, $command):bool {
        $direction = new Direction($rover->getDirection());
        if($command !== "F"){
            $newdirection = $direction->changeDirection($rover->getDirection(), $command);
            $rover->setDirection($newdirection);
        }
            switch ($rover->getDirection()){
                case "N":
                    $positionY = -1;
                    break;
                case "S":
                    $positionY = +1;
                    break;
                case "E":
                    $positionX = +1;
                    break;
                case "O":
                    $positionX = -1;
                    break;
            }
            
            if(isset($positionY) && ($rover->getY() + $positionY) >=0 && ($rover->getY() + $positionY) <=200){
                if($this->itsFreeObstacles($rover->getX(), $rover->getY() + $positionY)){
                    $rover->setY($rover->getY() + $positionY);
                    return true;

                };
            }else if(isset($positionX) && ($rover->getX() + $positionX) >=0 && ($rover->getX() + $positionX) <=200){
                if($this->itsFreeObstacles($rover->getX() + $positionX, $rover->getY())){
                    $rover->setX($rover->getX() + $positionX);
                    return true;
                }
            }
        return false;
    }

    private function itsFreeObstacles(int $newPositionX, int $newPositionY): bool
    {
        $obstacles = Session::get('obstacles');
        if(isset($obstacles)){
            foreach($obstacles as $obstacle){
                if($obstacle->getY() === $newPositionY && $obstacle->getX() === $newPositionX){
                    $obstacle->detected = true;
                    Session::put('obstacles',$obstacles);
                    return false;
                }
            }
            return true;
        }
        return true;
    }
}

