<?php

namespace education\classes;

class TerrainFactory
{
    #[InjectConstructor(Sea::class, Plains::class, Forest::class)]
    public function __construct(private Sea $sea, private Plains $plains, private Forest $forest)
    {
    }

    public function getSea(): Sea
    {
        return $this->sea;
    }

    public function getPlains(): Plains
    {
        return $this->plains;
    }

    public function getForest(): Forest
    {
        return $this->forest;
    }

}