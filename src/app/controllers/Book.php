<?php

namespace app\controllers;


use education\classes\FixedCostStrategy;
use education\classes\Lecture;
use education\classes\Seminar;
use education\classes\TimedCostStrategy;

class Book
{
    public function indexAction()
    {

        $lessons[] = new Seminar(4, new TimedCostStrategy());
        $lessons[] = new Lecture(4, new FixedCostStrategy());

        foreach ($lessons as $lesson){
            debug("Оплата за занятие {$lesson->cost()}. Тип оплаты {$lesson->chargeType()}.");
        }

        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 296',1);
    }
}