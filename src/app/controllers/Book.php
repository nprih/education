<?php

namespace app\controllers;

use education\classes\BloggsCommsManager;
use education\classes\EarthForest;
use education\classes\EarthPlains;
use education\classes\EarthSea;
use education\classes\TerrainFactory;


class Book
{
    public function indexAction():void
    {
        $factory = new TerrainFactory(new EarthSea(-1), new EarthPlains(), new EarthForest());
        debug($factory->getSea());
        debug($factory->getPlains());
        debug($factory->getForest());

        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 344',1);
    }
}