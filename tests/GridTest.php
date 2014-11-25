<?php

class GridTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckingTheNeighborhood()
    {
        $gird = new \Challenge\Grid(2);

        $tile = new \Challenge\Tile('abcd');

        $this->assertFalse($gird->hasNeighborTop());
        $this->assertFalse($gird->hasNeighborLeft());

        $gird->add($tile);

        $this->assertFalse($gird->hasNeighborTop());
        $this->assertTrue($gird->hasNeighborLeft());

        $gird->add($tile);

        $this->assertTrue($gird->hasNeighborTop());
        $this->assertFalse($gird->hasNeighborLeft());

        $gird->add($tile);

        $this->assertTrue($gird->hasNeighborTop());
        $this->assertTrue($gird->hasNeighborLeft());
    }

    public function testMeetingTheNeighborhood()
    {
        $grid = new \Challenge\Grid(2);

        $tileSet = [
            $tile_0 = new \Challenge\Tile('abcd'),
            $tile_1 = new \Challenge\Tile('abcd'),
            $tile_2 = new \Challenge\Tile('abcd'),
            $tile_3 = new \Challenge\Tile('abcd'),
        ];

        $grid->add($tile_0);
        $this->assertSame($tile_0, $grid->getNeighborLeft());

        $grid->add($tile_1);
        $this->assertSame($tile_0, $grid->getNeighborTop());

        $grid->add($tile_2);
        $this->assertSame($tile_2, $grid->getNeighborLeft());
        $this->assertSame($tile_1, $grid->getNeighborTop());

    }

    public function testGridIsStillEmpty()
    {
        $grid = new \Challenge\Grid(2);

        $this->assertTrue($grid->isEmpty());

        $tileSet = [
            $tile_0 = new \Challenge\Tile('abcd'),
            $tile_1 = new \Challenge\Tile('abcd'),
            $tile_2 = new \Challenge\Tile('abcd'),
            $tile_3 = new \Challenge\Tile('abcd'),
        ];

        $grid->add($tile_0);

        $this->assertFalse($grid->isEmpty());
    }

    public function testAddingTiles()
    {
        $grid = new \Challenge\Grid(2);

        $this->assertCount(0, $grid);

        $grid->add(new \Challenge\Tile('CYMk', 'A'));

        $this->assertCount(1, $grid);

        $grid->add(new \Challenge\Tile('asfd', 'B'));

        $this->assertCount(2, $grid);
    }
}