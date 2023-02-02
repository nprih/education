<?php

namespace app\controllers;

use education\classes\NastyBoss;
use education\classes\Employee;

class Book
{
    public function indexAction():void
    {
        $boss = new NastyBoss();
        $boss->addEmployee(Employee::recruit('Игорь'));
        $boss->addEmployee(Employee::recruit('Владимир'));
        $boss->addEmployee(Employee::recruit('Мария'));

        $boss->projectFails();
        $boss->projectFails();
        $boss->projectFails();


        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 314',1);
    }
}