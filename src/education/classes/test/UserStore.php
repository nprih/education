<?php

namespace education\classes\test;

class UserStore
{
    private array $users = [];

    public function addUser(string $name, string $mail, string $pass): bool
    {
        if (isset($this->users[$mail]))
        {
            throw new \Exception("Пользователь {$mail} уже есть в системе");
        }
        $this->users[$mail] = new User($name, $mail, $pass);
        return true;
    }

    public function notifyPasswordFailure(string $mail): void
    {
        if (isset($this->users[$mail]))
        {
            $this->users[$mail]->failed(time());
        }
    }

    public function getUser(string $mail): ? User
    {
        if (isset($this->users[$mail]))
        {
            return $this->users[$mail];
        }
        return null;
    }
}
