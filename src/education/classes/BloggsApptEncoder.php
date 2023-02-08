<?php

namespace education\classes;

class BloggsApptEncoder extends ApptEncoder
{

    public function encode(): string
    {
        return 'Данные о встрече в формате BloggsCal<br>';
    }
}