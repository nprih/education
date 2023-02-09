<?php

namespace education\classes;

class Army extends Unit
{
    private array $units = [];

    public function addUnit(Unit $unit): void
    {
        if (in_array($unit, $this->units, true))
        {
            return;
        }
        $this->units[] = $unit;
    }

    public function removeUnit(Unit $unit): void
    {
        $idx = array_search($unit, $this->units, true);
        if (is_int($idx))
        {
            array_splice($this->units, $idx, 1, []);
        }
    }

    public function bombardStrenght(): int
    {
        $ret = 0;

        foreach ($this->units as $unit)
        {
            $ret += $unit->bombardStrenght();
        }

        return $ret;
    }

}