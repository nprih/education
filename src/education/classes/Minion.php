<?php

namespace education\classes;

class Minion extends Employee
{

    public function fire(): void
    {
        debug("{$this->name}: я уберу со стола<br>");
    }
}