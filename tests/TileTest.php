<?php

class TileTest extends \PHPUnit_Framework_TestCase
{
    public function testRotation()
    {
        $tile = new Challenge\Tile('cymk');

        $this->assertSame('c', $tile->getNorth());
        $this->assertSame('y', $tile->getEast());
        $this->assertSame('m', $tile->getSouth());
        $this->assertSame('k', $tile->getWest());

        $tile->rotate();

        $this->assertSame('k', $tile->getNorth());
        $this->assertSame('c', $tile->getEast());
        $this->assertSame('y', $tile->getSouth());
        $this->assertSame('m', $tile->getWest());

        $tile->rotate();

        $this->assertSame('m', $tile->getNorth());
        $this->assertSame('k', $tile->getEast());
        $this->assertSame('c', $tile->getSouth());
        $this->assertSame('y', $tile->getWest());

        $tile->rotate();

        $this->assertSame('y', $tile->getNorth());
        $this->assertSame('m', $tile->getEast());
        $this->assertSame('k', $tile->getSouth());
        $this->assertSame('c', $tile->getWest());

        $tile->rotate();

        $this->assertSame('c', $tile->getNorth());
        $this->assertSame('y', $tile->getEast());
        $this->assertSame('m', $tile->getSouth());
        $this->assertSame('k', $tile->getWest());

        $this->assertTrue(true);
    }
}