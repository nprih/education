<?php

namespace education\classes;

class GeneralLogger extends LoginObserver
{

    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        debug(__CLASS__ . ': добавление данных о входе в журнал<br>');
    }
}