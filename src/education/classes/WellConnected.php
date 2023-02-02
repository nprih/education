<?php

namespace education\classes;

class WellConnected extends Employee
{

    public function fire(): void
    {
        debug("{$this->name}: я позвоню папе");
    }
}