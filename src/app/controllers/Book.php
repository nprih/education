<?php

namespace app\controllers;


use education\classes\AppointmentMaker;
use education\classes\AppointmentMaker2;
use education\classes\ApptEncoder;
use education\classes\MegaApptEncoder;
use education\classes\ObjectAssembler;
use education\classes\TerrainFactory;


class Book
{
    public function indexAction():void
    {
        $assembler = new ObjectAssembler(EDUCATION . '/internal/conf3.xml');
        $apptmaker = $assembler->getComponent(AppointmentMaker::class);
        $output = $apptmaker->makeAppointment();
        debug($output);


        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 363',1);
    }
}