<?php

namespace app\Services;
use App\Models\Rover\Rover; 
use App\Models\Move\Direction;
use Session;

class NewPosition
{

public function NewPosition( Rover $rover, $command, $request) {
        
        $direction = new Direction($rover->direction);
        if($command !== "F"){
            $newdirection = $direction->changeDirection($rover->direction, $command);
            $rover->setDirection($newdirection);
        }
       
            switch ($rover->direction){
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
            if(isset($positionY) && ($rover->getY() + $positionY) >0){
                if($this->itsFreeObstacles($rover->getX(), $rover->getY() + $positionY)){
                    $rover->setY($rover->getY() + $positionY);
                    return true;

                };
                return false;

            }else if(isset($positionX) && ($rover->getX() + $positionX) >=0){
                if($this->itsFreeObstacles($rover->getX() + $positionX, $rover->getY())){
                    $rover->setX($rover->getX() + $positionX);
                    return true;

                }
                return false;
            }
    }

    private function itsFreeObstacles($newPositionX, $newPositionY)
    {
        $obstacles = Session::get('obstacles');

        foreach($obstacles as $obstacle){
            if($obstacle->getY() === $newPositionY && $obstacle->getX() === $newPositionX){
                $obstacle->detected = true;
                Session::put('obstacles',$obstacles);
                return false;
            }
        }
        return true;
    }
}

