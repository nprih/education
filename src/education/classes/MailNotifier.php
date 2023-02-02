<?php

namespace education\classes;

class MailNotifier extends Notifier
{

    public function inform($message): void
    {
        debug("Уведомление почтой: {$message}<br>");
    }
}