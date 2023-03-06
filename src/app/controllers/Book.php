<?php

namespace app\controllers;

use education\classes\test\UserStore;
use education\classes\test\Validator;

class Book
{
    public function indexAction():void
    {
        $store = new UserStore();
        $store->addUser('bob wiliams', 'bob@example.com', '12345');
        $validator = new Validator($store);

        if ($validator->validateUser('bob@example.com', '12345'))
        {
            debug('Привет, друг!<br>');
        }

        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 59, Slim, PHPUnit, Twig',1);
    }
}