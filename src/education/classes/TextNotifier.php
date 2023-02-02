<?php

namespace education\classes;

class TextNotifier extends Notifier
{

    public function inform($message): void
    {
        debug("Уведомление текстом: {$message}<br>");
    }
}