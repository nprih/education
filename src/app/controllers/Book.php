<?php

namespace app\controllers;


use education\classes\AppointmentMaker2;
use education\classes\ApptEncoder;
use education\classes\MegaApptEncoder;
use education\classes\ObjectAssembler;


class Book
{
    public function indexAction():void
    {
        $assembler = new ObjectAssembler(EDUCATION . '/internal/conf3.xml');
        $apptmaker = $assembler->getComponent(AppointmentMaker2::class);
        $out = $apptmaker->makeAppointment();

        debug($out);


        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 351',1);
    }
}