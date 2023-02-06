<?php

namespace education\classes;

abstract class ContactEncoder
{
    abstract public function encode(): string;
}