<?php

namespace education\classes;

abstract class Notifier
{
    public static function getNotifier(): Notifier
    {
        if (rand(1, 2) === 1){
            return new MailNotifier();
        } else {
            return new TextNotifier();
        }
    }
    abstract public function inform($message): void;
}