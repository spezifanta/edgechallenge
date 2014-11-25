<?php

namespace Challenge;

class Tile
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $orientation;

    /**
     * @var int
     */
    private $position;

    /**
     * @var string
     */
    private $context;

    /**
     * @param $context
     * @param null $name
     */
    public function __construct($context, $name = null)
    {
        $this->context = $context;
        $this->name = $name;
        $this->orientation = 0;  // north;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * Rotate tile clockwise
     */
    public function rotate()
    {
        $this->orientation = ($this->orientation + 3) % 4;
    }

    /**
     * @return string
     */
    public function getNorth()
    {
        return $this->context[$this->orientation % 4];
    }

    /**
     * @return string
     */
    public function getEast()
    {
        return $this->context[($this->orientation + 1) % 4];
    }

    /**
     * @return string
     */
    public function getSouth()
    {
        return $this->context[($this->orientation + 2) % 4];
    }

    /**
     * @return string
     */
    public function getWest()
    {
        return $this->context[($this->orientation + 3) % 4];
    }

    /**
     * @param $position
     *
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name . '('. $this->getOrientationAsString() . ')' . $this->getNorth() . $this->getEast() . $this->getSouth() . $this->getWest();
    }

    public function getOrientationAsString()
    {
        $o = [
            0 => 'N',
            3 => 'E',
            2 => 'S',
            1 => 'W'
        ];

        return $o[$this->orientation];
    }
}