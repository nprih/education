<?php

namespace education\classes;

class NastyBoss
{
    private array $employees = [];

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function projectFails(): void
    {
        if (count($this->employees) > 0){
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}