<?php

namespace education\classes;

class UnitScript
{
    public static function joinExisting(Unit $newUnit, Unit $occopyingUnit): CompositeUnit
    {
        $comp = $occopyingUnit->getComposite();

        if (! is_null($comp))
        {
            $comp->addUnit($newUnit);
        }
        else
        {
            $comp = new Army();
            $comp->addUnit($occopyingUnit);
            $comp->addUnit($newUnit);
        }
        return $comp;
    }
}