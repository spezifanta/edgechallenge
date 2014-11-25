<?php

class RulesTest extends \PHPUnit_Framework_TestCase
{
    public function testValidity()
    {
        $tileSet = [
            $tile_a = new \Challenge\Tile('cmyk', 'A'),
            $tile_b = new \Challenge\Tile('MYkC', 'B'),
            $tile_c = new \Challenge\Tile('cYmk', 'C'),
            $tile_d = new \Challenge\Tile('MYKC', 'D'),
        ];

        $grid = new \Challenge\Grid(2);
        $rules = new \Challenge\Rules($grid);

        $this->assertTrue($rules->isValid($tile_d));
        $grid->add($tile_d);

        $this->assertFalse($rules->isValid($tile_a));
        $this->assertSame(ord('k'), $tile_a->getWest());
        $tile_a->rotate();
        $this->assertSame(ord('y'), $tile_a->getWest());
        $this->assertTrue($rules->isValid($tile_a));
        $grid->add($tile_a);

        $this->assertFalse($rules->isValid($tile_c));
        $tile_c->rotate();
        $this->assertSame(ord('k'), $tile_c->getNorth());
        $this->assertTrue($rules->isValid($tile_c));
        $grid->add($tile_c);

        $this->assertTrue($rules->isValid($tile_b));
        $grid->add($tile_b);

        $this->assertTrue($grid->isFull());

        foreach ($grid as $tile) {
            printf($tile . PHP_EOL);
        }

    }


    public function testCompare()
    {
        $rules = new \Challenge\Rules(new \Challenge\Grid(2));

        $this->assertTrue($rules->compare(ord('C'), ord('c')));
        $this->assertTrue($rules->compare(ord('c'), ord('C')));

        $this->assertFalse($rules->compare(ord('C'), ord('C')));
        $this->assertFalse($rules->compare(ord('C'), ord('Y')));
        $this->assertFalse($rules->compare(ord('C'), ord('y')));
    }
}