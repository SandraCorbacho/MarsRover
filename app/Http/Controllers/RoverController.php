<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\NewPosition;
use App\Services\NewObstacles;
use App\Models\Move\Move;
use App\Models\Rover\Rover;
use App\Models\Move\Direction;
use Illuminate\Support\Facades\Session;


class RoverController extends Controller
{
    public function initial (request $request) {
      
        $validated = $request->validate([
            'x' => 'required|min:0|max:200',
            'y' => 'required|min:0|max:200',
            'direction' => 'required'
            ]);
        if($validated){
            $data = $request->all();
            $x = (int) $data['x'];
            $y = (int) $data['y'];

          
            $rover = new Rover ();

            $rover->setX($data['x']);
            $rover->setY($data['y']);
            $rover->setDirection($data['direction']);
        
            if(!(Session::get('obstacles'))){
                $obstacles = (new NewObstacles())->newObstacles($rover);
                Session::put('obstacles', $obstacles);
            }
           
                return view('mart')
                ->with('rover' ,$rover);
        }
    }

    public function move(Request $request)
    {
        $data = $request->all();
        $currentPosition = json_decode($data['rover']);
        $rover = new Rover ();

        $rover ->setX($currentPosition->x);
        $rover ->setY($currentPosition->y);
        $rover ->setDirection($currentPosition->direction);

        $commands = str_split($data['Command']);
        $newPosition = new NewPosition(); 

        foreach($commands as $command){
          
                if(!$newPosition->NewPosition($rover, $command, $request)){
                    return view('mart')
                    ->with('rover' ,$rover)
                    ->with('error', "Ups, cuidado no podemos seguir avanzando!");
                }
        }

        return view('mart')
        ->with('rover' ,$rover);
    }
}
