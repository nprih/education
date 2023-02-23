<?php

namespace education\classes;

class TestClass
{
    public function testFunction(): string
    {
        return 'Тестовый класс: ' . __CLASS__;
    }

    public function testMethod(): string
    {
        return 'Тестовый метод: ' . __METHOD__;
    }
}