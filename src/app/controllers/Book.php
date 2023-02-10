<?php

namespace app\controllers;

use education\classes\BooleanEqualsExpression;
use education\classes\BooleanOrExpression;
use education\classes\InterpreterContext;
use education\classes\LiteralExpression;
use education\classes\VAriableExpression;

class Book
{
    public function indexAction():void
    {
        $context = new InterpreterContext();
        $input = new VAriableExpression('input');
        $statement = new BooleanOrExpression(new BooleanEqualsExpression($input, new LiteralExpression('четыре')),
                                                new BooleanEqualsExpression($input, new LiteralExpression(4)));

        foreach (['четыре', '4', '52'] as $val)
        {
            $input->setValue($val);
            debug('$val:<br>');
            $statement->interpret($context);

            if ($context->lookup($statement)){
                debug('Правильный ответ!<br><br>');
            } else {
                debug('Вы ошиблись!<br><br>');
            }
        }

        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 409',1);
    }
}