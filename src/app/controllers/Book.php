<?php

namespace app\controllers;

use education\classes\Controller;


class Book
{
    public function indexAction():void
    {
        $controller = new Controller();
        $context = $controller->getContext();

        $context->addParam('action', 'login');
        $context->addParam('username', 'Иван');
        $context->addParam('pass', 'tiddles');

        $controller->process();

        debug($controller->getError());


        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 444',1);
    }
}