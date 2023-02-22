<?php

namespace app\controllers;

use education\classes\TestClass;

class Book
{
    public function indexAction():void
    {

        $test = new TestClass();
        debug($test->testFunction());

        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 669',1);
    }
}