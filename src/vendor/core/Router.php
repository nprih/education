<?php

namespace vendor\core;
class Router
{
    private static array $routes = [
//        '^/pages/?(?P<action>[a-z-]+)?' => ['controller' => 'Posts'],
        '^/$' => ['controller' => 'Main', 'action' => 'index'],
        '^/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$' => ['controller' => 'Main', 'action' => 'index']
    ];

    private static array $route = [];

    private static function getRoutes(): array
    {
        return self::$routes;
    }

    private static function getRoute(): array
    {
        return self::$route;
    }

    private static function matchRoute(string $url): bool
    {
        foreach (self::$routes as $pattern => $route){

            if ( preg_match("#$pattern#i", $url, $matches) ){

                foreach ($matches as $key => $value){

                    if (is_string($key)){

                        $route[$key] = $value;

                    }

                    if (!isset($route['action'])){

                        $route['action'] = 'index';

                    }

                }

                self::$route = $route;

                return true;
            }

        }

        return false;
    }

    public static function dispatch(): void
    {
        $url = rtrim($_SERVER['REQUEST_URI']);

        self::autoload();

        if (self::matchRoute($url)){

            $controller = 'app\controllers\\' . self::upperCamelCase(self::$route['controller']);

            if (class_exists($controller)){

                $cobj = new $controller;
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';

                if (method_exists($cobj, $action)){

                    $cobj->$action();

                } else {

                    echo "Метод <b>$controller::$action</b> не найден";

                }

            } else {

                echo "Контроллер <b>$controller</b> не найден";

            }

        } else {

            http_response_code(404);
            require_once VENDOR . '/404.php';

        }
    }

    private static function upperCamelCase(string $name): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    private static function lowerCamelCase(string $name): string
    {
        return lcfirst(self::upperCamelCase($name));
    }

    private static function autoload(): void
    {
        spl_autoload_register(function (string $class){

            $file = ROOT . '/' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

            if (is_file($file)){

                require_once $file;

            }

        });
    }
}