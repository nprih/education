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

    if ($_SERVER['REQUEST_URI'] === '/'){
        $route = $_SERVER['REQUEST_URI'];
    }

//    debug($uri);
//    debug($route,1);

    switch (true){

        case $route == '/':
//            phpinfo();

//            $connection = mysqli_connect('mysql', 'root', 'root');
//            var_dump($connection);

            break;

        case $route == 'course':

            require_once EDUCATION . "/Strings.php";
            require_once EDUCATION . "/Symbols.php";

            require_once EDUCATION . "/{$route}.php";

            break;

        case $route == 'book':

            require_once CONFIG . '/config_db.php';

            require_once EDUCATION . "/{$route}.php";

            break;

        default:
            http_response_code(404);
            require_once ERRORS . '/404.php';
            break;
    }

}
