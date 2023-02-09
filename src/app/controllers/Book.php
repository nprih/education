<?php

namespace app\controllers;

use education\classes\Archer;
use education\classes\Army;
use education\classes\LaserCannonUnit;

class Book
{
    public function indexAction():void
    {
        $main_army = new Army();

        $main_army->addUnit(new Archer());
        $main_army->addUnit(new LaserCannonUnit());

        $sub_army = new Army();

        $sub_army->addUnit(new Archer());
        $sub_army->addUnit(new Archer());
        $sub_army->addUnit(new Archer());

        $main_army->addUnit($sub_army);

        debug('Атака с силой: ' . $main_army->bombardStrenght() . '<br>');

        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 381',1);
    }
}