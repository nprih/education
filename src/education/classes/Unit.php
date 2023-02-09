<?php

namespace education\classes;

abstract class Unit
{
    public function getComposite(): ? CompositeUnit
    {
        return null;
    }
    abstract public function bombardStrenght(): int;
}