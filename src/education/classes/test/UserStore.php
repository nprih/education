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
        if (strlen($pass) < 5)
        {
            throw new \Exception("Пароль должен быть не короче 5 символов");
        }

        $this->users[$mail] = [
            'pass' => $pass,
            "mail" => $mail,
            'name' => $name
        ];

        return true;
    }

    public function notifyPasswordFailure(string $mail): void
    {
        if (isset($this->users[$mail]))
        {
            $this->users[$mail]['failed'] = time();
        }
    }

    public function getUser(string $mail): array
    {
        return $this->users[$mail];
    }
}
