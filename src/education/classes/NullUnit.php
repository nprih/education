<?php

namespace education\classes;

class NullUnit extends Unit
{

    public function bombardStrenght(): int
    {
        return 0;
    }

    public function getHealth(): int
    {
        return 0;
    }

    public function getDepth():int
    {
        return 0;
    }
}