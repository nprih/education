<?php

namespace education\classes;

class CluedUp extends Employee
{

    public function fire(): void
    {
        debug("{$this->name}: я вызову адвоката<br>");
    }
}