<?php

require 'router.php';

/**
 * Функция распечатки всего, в частности массивов/объектов в читабельном виде.
 * @param mixed $arr
 * @param int $stop
 * @return void
 */
function debug(mixed $arr, int $stop = 0): void
{
    echo '<pre>';
    print_r($arr);
    if ($stop == 1){
        exit('</pre>');
    }
    echo '</pre>';
}

/**
 * Адрессные константы
 */
define('ROOT',dirname(__DIR__));
const EDUCATION = ROOT . '/education';
const ERRORS = ROOT . '/errors';
const LAYOUTS = ROOT . '/layouts';
const CONFIG = ROOT . '/config';

