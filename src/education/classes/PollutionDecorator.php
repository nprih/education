<?php

namespace education\classes;

class PollutionDecorator extends TileDecorator
{

    public function getWealthFactor(): int
    {
        return $this->tile->getWealthFactor() - 4;
    }
}