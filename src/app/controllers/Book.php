<?php

namespace app\controllers;


class Book
{
    public function indexAction(): void
    {
        $url = parse_url('http://yandex.ru?key=value&key2=value2');
        debug($url);
        $queryParams = [];

        if (isset($url['query'])) {
            parse_str($url['query'], $queryParams);
        }
        

        debug($queryParams);
        debug('</br></br>');
        debug('Класс: ' . __CLASS__ . '</br>Метод: ' . __FUNCTION__);
        debug(str_replace($_SERVER['HOME'] . '/', '', __FILE__) . ' стр.: 247, Slim, PHPUnit, Twig');

        echo
<<<'EOF'
<style>body{font-size: 16px;}</style>
src:<br>
https://www.pascallandau.com/blog/run-laravel-9-docker-in-2022/<br>
https://git.pleer.ru/prinik-group<br>
https://buildmedia.readthedocs.org/media/pdf/phpunit-documentation-russian/latest/phpunit-documentation-russian.pdf<br><br>
https://php-di.org/doc/<br>
https://www.slimframework.com/docs/v4/concepts/di.html<br><br>
https://www.doctrine-project.org/projects.html<br>                
EOF;

        debug('STOP', 1);
    }
}
