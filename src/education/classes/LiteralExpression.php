<?php

namespace education\classes;

class LiteralExpression extends Expression
{
    private mixed $value;
    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    public function interpret(InterpreterContext $context): void
    {
        $context->replace($this, $this->value);
    }
}