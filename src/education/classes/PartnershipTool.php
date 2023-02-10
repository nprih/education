<?php

namespace education\classes;

class PartnershipTool extends LoginObserver
{

    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        debug(__CLASS__ . ': Установка cookie при соответсвии списку<br>');
    }
}