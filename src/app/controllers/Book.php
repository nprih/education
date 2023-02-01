<?php

namespace app\controllers;


class Book
{
    public function indexAction()
    {

        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 274',1);
    }
}