<?php

namespace education\classes;

class InterpreterContext
{
    private array $expressionstore = [];

    public function replace(Expression $exp, mixed $value): void
    {
        $this->expressionstore[$exp->getKey()] = $value;
    }

    public function lookup(Expression $exp): mixed
    {
        return $this->expressionstore[$exp->getKey()];
    }
}