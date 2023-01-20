<?php

/**
 * Роутер
 * @return void
 */
function initRouter(): void
{
    preg_match('/^\/(\w+)\/?$/', $_SERVER['REQUEST_URI'], $uri);

    $route = 'err';
    if ($uri != []) {
        $route = $uri[1] ?? '/';
    }

//    debug($uri);
//    debug($route,1);

    switch (true){

        case $route == '/':
            debug('index.php');
            break;

        case $route == 'course':

            require_once EDUCATION . "/Strings.php";
            require_once EDUCATION . "/Symbols.php";

            require_once EDUCATION . "/{$route}.php";

            break;

        case $route == 'book':

            require_once EDUCATION . "/{$route}.php";

            break;

        default:
            http_response_code(404);
            require_once ERRORS . '/404.php';
            break;
    }

}
