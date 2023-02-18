<?php

namespace app\controllers;

class Book
{
    public function indexAction():void
    {



        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 554',1);
    }
}