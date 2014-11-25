<?php

namespace Challenge;


class Rules
{
    /**
     * @var Grid
     */
    private $grid;

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
        if (!$this->grid->hasNeighbors($tile)) {
            return true;
        }

        if (!$this->grid->hasNeighborTop($tile) && $this->grid->hasNeighborLeft($tile)) {
            return $this->compareToLeft($tile);
        }

        if ($this->grid->hasNeighborTop($tile) && !$this->grid->hasNeighborLeft($tile)) {
            return $this->compareToTop($tile);
        }

        return $this->compareToTop($tile) && $this->compareToLeft($tile);

    }

    /**
     * @param Tile $tile
     *
     * @return bool
     */
    public function compareToTop(Tile $tile){
        //printf("Comparing $tile to top\n");
        return $this->compare(
            $this->grid->getNeighborTop($tile)->getSouth(),
            $tile->getNorth()
        );
    }

    /**
     * @param Tile $tile
     *
     * @return bool
     */
    public function compareToLeft(Tile $tile) {
        //printf("Comparing $tile to left\n");
        return $this->compare(
            $this->grid->getNeighborLeft($tile)->getEast(),
            $tile->getWest()
        );
    }

    /**
     * Compare to sides. Match C -> c and c -> C
     *
     * @param string $first
     * @param string $second
     *
     * @return bool
     */
    public function compare($first, $second)
    {
        switch ($first) {
            case 'C':
                return $second === 'c';
            case 'Y':
                return $second === 'y';
            case 'M':
                return $second === 'm';
            case 'K':
                return $second === 'k';
            case 'c':
                return $second === 'C';
            case 'y':
                return $second === 'Y';
            case 'm':
                return $second === 'M';
            case 'k':
                return $second === 'K';
            default:
                return false;
        }
    }
}