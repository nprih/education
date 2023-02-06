<?php

namespace education\classes;

class BloggsApptEncoder extends ApptEncoder
{

    public function encode(): BloggsApptEncoder
    {
        return 'Данные о встрече в формате BloggsCal<br>';
    }
}