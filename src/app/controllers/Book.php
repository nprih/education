<?php

namespace app\controllers;

use education\classes\DiamondPlains;
use education\classes\Plains;

class Book
{
    public function indexAction():void
    {
        $tile = new Plains();
        debug($tile->getWealthFactor());

        $tile = new DiamondPlains(new Plains());
        debug($tile->getWealthFactor());

        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 390',1);
    }
}