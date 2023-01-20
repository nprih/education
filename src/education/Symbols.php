<?php

namespace App\Symbols;

/**
 * @param string $char
 * @return bool
 */
function isVowel(string $char): bool
{
    $vowels = 'aeiouy';
    return str_contains($vowels, strtolower($char));
}