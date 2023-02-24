<?php

namespace education\classes\test;

class User
{
    private string $pass;
    private ? string $failed;
    public function __construct(private string $name,
                                private string $mail,
                                string $pass)
    {
        if (strlen($pass) < 5)
        {
            throw new \Exception('Пароль должен быть не короче 5 символов');
        }
        $this->pass = $pass;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function getPass(): string
    {
        return $this->pass;
    }

    public function failed(string $time): void
    {
        $this->failed = $time;
    }



}