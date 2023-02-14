<?php

namespace education\classes;

class CommandFactory
{
    private static string $dir = 'commands';

    public static function getCommand(string $action = 'Default'): Command
    {
        if (preg_match('/\W/', $action)){
            throw new \Exception('Неверные символы в команде');
        }

        $class = __NAMESPACE__ . '\\commands\\' . ucfirst(strtolower($action)) . 'Command';

        if (! class_exists($class))
        {
            throw new CommandNotFoundException("Класс '$class' не обнаружен");
        }

        $cmd = new $class;
        return $cmd;
    }
}