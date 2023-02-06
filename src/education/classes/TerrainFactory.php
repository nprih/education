<?php

namespace education\classes;

class TerrainFactory
{
    public function __construct(private Sea $sea, private Plains $plains, private Forest $forest)
    {
    }

    /**
     * @return Sea
     */
    public function getSea(): Sea
    {
        return $this->sea;
    }

    /**
     * @return Plains
     */
    public function getPlains(): Plains
    {
        return $this->plains;
    }

    /**
     * @return Forest
     */
    public function getForest(): Forest
    {
        return $this->forest;
    }

}