<?php

namespace app\controllers;

use education\classes\test\UserStore;
use education\classes\test\Validator;

class Book
{
    public function indexAction():void
    {


        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 135, Slim, PHPUnit, Twig');

        echo '<style>body{font-size: 16px;}</style>
                src:<br>
                https://www.pascallandau.com/blog/run-laravel-9-docker-in-2022/<br>
                https://git.pleer.ru/prinik-group<br>
                https://buildmedia.readthedocs.org/media/pdf/phpunit-documentation-russian/latest/phpunit-documentation-russian.pdf
                ';


        debug('STOP',1);

    }
}