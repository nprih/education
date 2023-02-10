<?php

namespace app\controllers;

use education\classes\GeneralLogger;
use education\classes\Login;
use education\classes\PartnershipTool;
use education\classes\SecurityMonitor;

class Book
{
    public function indexAction():void
    {
        $login = new Login();
        new SecurityMonitor($login);
        new GeneralLogger($login);
        new PartnershipTool($login);

        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 426',1);
    }
}