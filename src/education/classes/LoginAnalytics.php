<?php

namespace education\classes;

class LoginAnalytics implements Observer
{

    public function update(Observable $observable): void
    {
        $status = $observable->getStatus();
        debug(__CLASS__ . ': обработка информации о состоянии<br>');
    }
}