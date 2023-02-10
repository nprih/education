<?php

namespace education\classes;

class BooleanAndExpression extends OperatorExpression
{

    protected function doInterpret(InterpreterContext $context, mixed $result_l, mixed $result_r): void
    {
        $context->replace($this, $result_l && $result_r);
    }
}