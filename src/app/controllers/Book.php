<?php

namespace app\controllers;
use education\classes\Objects;

class Book
{
    public function indexAction()
    {
        $class = new Objects();

        debug($class->getClassName());

        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 240',1);
    }
}