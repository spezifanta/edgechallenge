<?php

class GridTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckingTheNeighborhood()
    {
        $gird = new \Challenge\Grid(2);

        $tile = new \Challenge\Tile('abcd');

        $this->assertFalse($gird->hasNeighbors($tile));
        $this->assertFalse($gird->hasNeighborTop($tile));
        $this->assertFalse($gird->hasNeighborLeft($tile));

        $tile->setPosition(1);
        $gird->add($tile);

        $this->assertTrue($gird->hasNeighbors($tile));
        $this->assertFalse($gird->hasNeighborTop($tile));
        $this->assertTrue($gird->hasNeighborLeft($tile));

        $tile->setPosition(2);

        $this->assertTrue($gird->hasNeighbors($tile));
        $this->assertTrue($gird->hasNeighborTop($tile));
        $this->assertFalse($gird->hasNeighborLeft($tile));

        $tile->setPosition(3);

        $this->assertTrue($gird->hasNeighbors($tile));
        $this->assertTrue($gird->hasNeighborTop($tile));
        $this->assertTrue($gird->hasNeighborLeft($tile));
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

        $grid->setTileSet($tileSet);

        $this->assertSame($tile_0, $grid->getNeighborLeft($tile_1));
        $this->assertSame($tile_0, $grid->getNeighborTop($tile_2));
        $this->assertSame($tile_2, $grid->getNeighborLeft($tile_3));
        $this->assertSame($tile_1, $grid->getNeighborTop($tile_3));

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

        $grid->setTileSet($tileSet);

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