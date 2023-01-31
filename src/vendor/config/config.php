<?php
/**
 * Адрессные константы
 */
define('ROOT',dirname(__DIR__, 2));

const APP = ROOT . '/app';
const VENDOR = ROOT . '/vendor';
const CORE = VENDOR . '/core';
const CONFIG = VENDOR . '/config';

const MODELS = APP . '/models';
const VIEWS = APP . '/views';
const CONTROLLERS = APP . '/controllers';
const LAYOUTS = VIEWS . '/layouts';
const EDUCATION = ROOT . '/education';

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

require_once CORE . '/Router.php';

