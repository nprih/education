<?php

namespace education\classes;

class Person
{
    public function output(PersonWriter $writer): void
    {
        $writer->write($this);
    }

    public function getName(): string
    {
        return 'Иван';
    }

    public function getAge(): int
    {
        return 44;
    }
}