<?php

namespace education\classes;

class Army extends CompositeUnit
{
    public function bombardStrenght(): int
    {
        $strength = 0;

        foreach ($this->units as $unit)
        {
            $strength += $unit->bombardStrenght();
        }

        return $strength;
    }

}