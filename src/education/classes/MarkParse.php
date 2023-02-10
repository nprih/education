<?php

namespace education\classes;

class MarkParse extends Marker
{

    public function mark(string $response): bool
    {
        return true;
    }

    public function evaluate()
    {
        return true;
    }
}