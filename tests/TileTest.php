<?php

class TileTest extends \PHPUnit_Framework_TestCase
{
    public function testRotation()
    {
        $tile = new Challenge\Tile('cymk');

        $this->assertSame('c', chr($tile->getNorth()));
        $this->assertSame('y', chr($tile->getEast()));
        $this->assertSame('m', chr($tile->getSouth()));
        $this->assertSame('k', chr($tile->getWest()));

        $tile->rotate();

        $this->assertSame('k', chr($tile->getNorth()));
        $this->assertSame('c', chr($tile->getEast()));
        $this->assertSame('y', chr($tile->getSouth()));
        $this->assertSame('m', chr($tile->getWest()));

        $tile->rotate();

        $this->assertSame('m', chr($tile->getNorth()));
        $this->assertSame('k', chr($tile->getEast()));
        $this->assertSame('c', chr($tile->getSouth()));
        $this->assertSame('y', chr($tile->getWest()));

        $tile->rotate();

        $this->assertSame('y', chr($tile->getNorth()));
        $this->assertSame('m', chr($tile->getEast()));
        $this->assertSame('k', chr($tile->getSouth()));
        $this->assertSame('c', chr($tile->getWest()));

        $tile->rotate();

        $this->assertSame('c', chr($tile->getNorth()));
        $this->assertSame('y', chr($tile->getEast()));
        $this->assertSame('m', chr($tile->getSouth()));
        $this->assertSame('k', chr($tile->getWest()));
    }
}