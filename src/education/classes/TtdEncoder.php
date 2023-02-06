<?php

namespace education\classes;

abstract class TtdEncoder
{
    abstract public function encode(): string;
}