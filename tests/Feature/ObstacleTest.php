<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\NewObstacles;
use App\Models\Rover\Rover;
use App\Models\Rover\Obstacle;



class ObstacleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    private $rover;
  
    public function testCreateObstacles()
    {
        $rover = new Rover (100,23,"N");
        $obstacle = (new NewObstacles)->NewObstacles($rover);
        $this->assertTrue($obstacle[0] instanceof Obstacle);
    }

}
