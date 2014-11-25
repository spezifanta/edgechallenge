<?php

namespace Challenge;

class Grid implements \IteratorAggregate, \Countable
{
    /**
     * @var int
     */
    private $size;

    /**
     * @var array
     */
    private $tileSet;

    /**
     * @param $size
     */
    public function __construct($size)
    {
        $this->size = $size;
        $this->tileSet = [];
    }

    /**
     * @return \ArrayObject
     */
    public function getIterator()
    {
        return new \ArrayObject($this->tileSet);
    }

    public function count()
    {
        return count($this->tileSet);
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return count($this->tileSet) === 0;
    }

    /**
     * @return bool
     */
    public function isFull()
    {
        return count($this->tileSet) === $this->size ** 2 ;
    }

    /**
     * @param array $tileSet
     */
    public function setTileSet(array $tileSet)
    {
        for ($i = 0; list(, $tile) = each($tileSet); $i++) {
            $tile->setPosition($i);
        }
        $this->tileSet = $tileSet;
    }

    /**
     * @param Tile $tile
     *
     * @return $this
     */
    public function add(Tile $tile)
    {
        //printf("adding $tile\n");
        $tile->setPosition($this->getPosition($tile));
        $this->tileSet[] = $tile;

        return $this;
    }

    public function clean()
    {
        foreach ($this->tileSet as $tile) {
            $tile->setPosition(null);
        }
        $this->tileSet = [];
    }

    /**
     * Only the first Tile has no neighbors.
     *
     * @param Tile $tile
     *
     * @return bool
     */
    public function hasNeighbors(Tile $tile)
    {
        return count($this->tileSet) !== 0;
    }

    /**
     * The first row has no top neighbors.
     *
     * @param Tile $tile
     *
     * @return bool
     */
    public function hasNeighborTop(Tile $tile)
    {
        return $this->getPosition($tile) >= $this->size;
    }

    /**
     * Returns top Tile
     *
     * @param Tile $tile
     *
     * @return Tile
     */
    public function getNeighborTop(Tile $tile)
    {
        if ($this->getPosition($tile) - $this->size < 0) {
            $ts = 1;
        }
        return $this->tileSet[$this->getPosition($tile) - $this->size];
    }

    /**
     * The first column has no left neighbors.
     *
     * @param Tile $tile
     *
     * @return bool
     */
    public function hasNeighborLeft(Tile $tile)
    {
        return $this->getPosition($tile) % $this->size !== 0;
    }

    /**
     * @param Tile $tile
     *
     * @return Tile
     */
    public function getNeighborLeft(Tile $tile)
    {
        return $this->tileSet[$this->getPosition($tile) - 1];
    }

    /**
     * Returns the position of a given Tile.
     *
     * @param Tile $tile
     *
     * @return int
     */
    private function getPosition(Tile $tile)
    {
        return $tile->getPosition() === null ? count($this->tileSet) : $tile->getPosition();
    }
}