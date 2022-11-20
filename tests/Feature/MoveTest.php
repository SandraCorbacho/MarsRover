<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Move\Direction;
use App\Models\Rover\Rover;
use App\Services\NewPosition;


class MoveTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    private $direction;
    private $rover;

    public function testChangeDirectionE()
    {
        $direction = new Direction ("N");
        $newDirection = $direction->changeDirection("N","R");
        $this->assertEquals("E", $newDirection);
    }

    public function testChangeDirectionO()
    {
        $direction = new Direction ("N");
        $newDirection = $direction->changeDirection("N","L");
        $this->assertEquals("O", $newDirection);
    }

    public function testChangeDirectionS()
    {
        $direction = new Direction ("E");
        $newDirection = $direction->changeDirection("E","R");
        $this->assertEquals("S", $newDirection);
    }

    public function testMoveForWard()
    {
        $rover = new Rover (100,23,"N");
        $command = "F";
        $position =(new NewPosition)->NewPosition( $rover, $command);
        $this->assertTrue($position);
    }

    public function testNotMoveNForWard()
    {
        $rover = new Rover (20,0,"N");
        $command = "F";
        $position =(new NewPosition)->NewPosition( $rover, $command);
        $this->assertNotTrue($position);
    }

    public function testNotMoveSForWard()
    {
        $rover = new Rover (20,200,"S");
        $command = "F";
        $position =(new NewPosition)->NewPosition( $rover, $command);
        $this->assertNotTrue($position);
    }

    public function testNotMoveEForWard()
    {
        $rover = new Rover (200,200,"E");
        $command = "F";
        $position =(new NewPosition)->NewPosition( $rover, $command);
        $this->assertNotTrue($position);
    }

    public function testNotMoveOForWard()
    {
        $rover = new Rover (0,200,"O");
        $command = "F";
        $position =(new NewPosition)->NewPosition( $rover, $command);
        $this->assertNotTrue($position);
    }
}
