<?php

namespace Challenge;

class Grid implements \IteratorAggregate, \Countable
{
    /**
     * @var int
     */
    private $size;

    /**
     * @var int
     */
    private $sizeSquared;

    /**
     * @var int
     */
    private $tileSetSize;

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
        $this->sizeSquared = $size ** 2;
        $this->reset();
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
        return $this->tileSetSize === 0;
    }

    /**
     * @return bool
     */
    public function isFull()
    {
        return $this->tileSetSize === $this->sizeSquared ;
    }

    /**
     * @param Tile $tile
     *
     * @return $this
     */
    public function add(Tile $tile)
    {
        $this->tileSet[] = $tile;
        $this->tileSetSize++;

        return $this;
    }

    /**
     * Remove all Tiles form the Grid.
     */
    public function reset()
    {
        $this->tileSet = [];
        $this->tileSetSize = 0;
    }

    /**
     * The first row has no top neighbors.
     *
     * @return bool
     */
    public function hasNeighborTop()
    {
        return $this->tileSetSize >= $this->size;
    }

    /**
     * Returns top Tile
     *
     * @return Tile
     */
    public function getNeighborTop()
    {
        return $this->tileSet[$this->tileSetSize - $this->size];
    }

    /**
     * The first column has no left neighbors.
     *
     * @return bool
     */
    public function hasNeighborLeft()
    {
        return $this->tileSetSize % $this->size !== 0;
    }

    /**
     * @return Tile
     */
    public function getNeighborLeft()
    {
        return $this->tileSet[$this->tileSetSize - 1];
    }
}