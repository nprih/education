<?php

namespace education\classes;

class SecurityMonitor extends LoginObserver
{

    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        if ($status[0] = Login::LOGIN_WRONG_PASS)
        {
            debug(__CLASS__ . ': письмо сисадмину<br>');
        }
    }
}