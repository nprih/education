<?php

namespace education\classes;

class TroopCarrier extends CompositeUnit
{
    public function addUnit(Unit $unit): void
    {
        if ($unit instanceof Cavalry)
        {
            throw new UnitException('Лошади не ездят на БТР');
        }

        parent::addUnit($unit);
    }

    public function bombardStrenght(): int
    {
        return 0;
    }
}