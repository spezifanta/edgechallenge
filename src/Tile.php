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
     * @var string
     */
    private $context;

    /**
     * @var array
     */
    private $asciiMap;

    /**
     * @param $context
     * @param null $name
     */
    public function __construct($context, $name = null)
    {
        $this->context = $context;
        $this->name = $name;
        $this->orientation = 0;
        $this->convert();
    }

    /**
     * @return string
     */
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
        return $this->asciiMap[$this->orientation % 4];
    }

    /**
     * @return string
     */
    public function getEast()
    {
        return $this->asciiMap[($this->orientation + 1) % 4];
    }

    /**
     * @return string
     */
    public function getSouth()
    {
        return $this->asciiMap[($this->orientation + 2) % 4];
    }

    /**
     * @return string
     */
    public function getWest()
    {
        return $this->asciiMap[($this->orientation + 3) % 4];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name . ' ('. $this->getOrientationAsString() . ')';
    }

    /**
     * @return string
     */
    private function getOrientationAsString()
    {
        $orientations = [
            0 => 'N',
            3 => 'E',
            2 => 'S',
            1 => 'W'
        ];

        return $orientations[$this->orientation];
    }

    /**
     * Save decimal value of each char.
     */
    private function convert()
    {
        $this->asciiMap = str_split($this->context);

        array_walk($this->asciiMap, function (&$element) {
            $element = ord($element);
        });
    }
}