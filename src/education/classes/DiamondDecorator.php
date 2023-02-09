<?php

namespace education\classes;

class DiamondDecorator extends TileDecorator
{

    public function getWealthFactor(): int
    {
        return $this->tile->getWealthFactor() + 2;
    }
}