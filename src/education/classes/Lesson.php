<?php

namespace education\classes;

abstract class Lesson
{
    public function __construct(private int $duration, private  CostStrategy $costStrategy)
    {
    }

    public function cost(): int
    {
        return $this->costStrategy->cost($this);
    }

    public function chargeType(): string
    {
        return $this->costStrategy->chargeType();
    }

    public function getDuration(): int
    {
        return $this->duration;
    }
}