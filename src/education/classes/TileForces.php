<?php

namespace education\classes;

class TileForces
{
    private int $x;
    private int $y;
    private array $units = [];

    public function __construct(int $x, int $y, UnitAcquisition $acq)
    {
        $this->x = $x;
        $this->y = $y;
        $this->units = $acq->getUnits($this->x, $this->y);
    }

    public function firepower(): int
    {
        $power = 0;
        foreach ($this->units as $unit)
        {

            $power += $unit->bombardStrenght();


        }
        return  $power;
    }
}