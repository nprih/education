<?php

namespace education\classes;

class MegaApptEncoder extends ApptEncoder
{

    public function encode(): string
    {
        return 'Данные о встрече в формате MegaCal<br>';
    }
}