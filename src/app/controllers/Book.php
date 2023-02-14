<?php

namespace app\controllers;

use education\classes\Controller;
use education\classes\TileForces;
use education\classes\UnitAcquisition;


class Book
{
    public function indexAction():void
    {

        $acquirer = new UnitAcquisition();
        $tileforces = new TileForces(4, 2, $acquirer);
        $power = $tileforces->firepower();
        debug("Огневая мощь: {$power}<br>");

        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 452',1);
    }
}