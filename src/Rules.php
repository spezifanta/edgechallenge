<?php

namespace Challenge;

class Rules
{
    /**
     * @var Grid
     */
    private $grid;

    /**
     * @param Grid $grid
     */
    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    /**
     * Can a given Tile be placed on the Grid?
     *
     * @param Tile $tile
     *
     * @return bool
     */
    public function isValid(Tile $tile)
    {
        $top = true;
        $left = true;

        if ($this->grid->hasNeighborLeft($tile)) {
            $top = $this->compareToLeft($tile);
        }

        if ($this->grid->hasNeighborTop($tile)) {
             $left = $this->compareToTop($tile);
        }

        return $top && $left;
    }

    /**
     * @param Tile $tile
     *
     * @return bool
     */
    public function compareToTop(Tile $tile){
        return $this->compare(
            $this->grid->getNeighborTop()->getSouth(),
            $tile->getNorth()
        );
    }

    /**
     * @param Tile $tile
     *
     * @return bool
     */
    public function compareToLeft(Tile $tile) {
        return $this->compare(
            $this->grid->getNeighborLeft()->getEast(),
            $tile->getWest()
        );
    }

    /**
     * Compare to sides. Matches C -> c and c -> C
     *
     * @param int $first
     * @param int $second
     *
     * @return bool
     */
    public function compare($first, $second)
    {
        return abs($first - $second) == 32;
    }
}