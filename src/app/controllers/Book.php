<?php

namespace app\controllers;

use education\classes\Archer;
use education\classes\Army;
use education\classes\LaserCannonUnit;
use education\classes\TextDumpArmyVisitor;
use education\classes\Cavalry;
use education\classes\TaxCollectionVisitor;

class Book
{
    public function indexAction():void
    {
        $main_army = new Army();
        $main_army->addUnit(new  Archer());
        $main_army->addUnit(new LaserCannonUnit());
        $main_army->addUnit(new Cavalry());
        $taxcollector = new TaxCollectionVisitor();
        $main_army->accept($taxcollector);
        debug($taxcollector->getReport());
        debug('Всего');
        debug($taxcollector->getTax());

        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 437',1);
    }
}