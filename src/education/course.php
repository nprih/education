<?php
// BEGIN (write your solution here)
namespace App\Course; /**Решение задачи 37 урока*/
// END

/**
 * Решение задачи 21 урока
 * @param string $num
 * @param int $end
 * @return string
 */
function getHiddenCard(string $num, int $end = 4):string
{
    return substr_replace($num, str_repeat('*', $end), 0, strlen($num) - $end);
}

/**
 * Решение задачи 22 урока
 * @param int $date1
 * @param int $date2
 * @return string
 */
function getAgeDifference(int $date1, int $date2):string
{
    return 'The age difference is ' . abs($date1 - $date2);
}


/**
 * Решение задачи 23 урока
 * @param int $day
 * @param int $month
 * @param int $year
 * @return string
 */
function getFormattedBirthday(int $day, int $month, int $year): string
{
    return sprintf('%02d-%02d-%d', $day, $month, $year);
}

/**
 * Решение задачи 24 урока
 * @param int $year
 * @return bool
 */
function isLeapYear(int $year): bool
{
    return $year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0);
}

/**
 * Решение задачи 25 урока
 * @param string $url
 * @return string
 */
function normalizeUrl(string $url): string
{
    if (str_starts_with($url, 'https')){
        return $url;
    } elseif (str_starts_with($url, 'http')){
        return str_replace('http', 'https', $url);
    } else {
        return 'https://' . $url;
    }
}

/**
 * Решение задачи 26 урока
 * @param string $str
 * @return string
 */
function convertText(string $str): string
{
    if (ctype_upper($str[0])){
        return $str;
    }
    return strrev($str);
}

/**
 * Решение задачи 26 урока (второй способ)
 * @param string $str
 * @return string
 */
function convertText2(string $str): string
{
    return ctype_upper($str[0]) ? $str : strrev($str);
}

/**
 * Решение задачи 27 урока
 * @param string $operation
 * @param int $d1
 * @param int $d2
 * @return float|null
 */
function calculate(string $operation, int $d1, int $d2): float|null
{
    switch ($operation){
        case '+':
            return $d1 + $d2;
        case '-':
            return $d1 - $d2;
        case '*':
            if ($d2 !== 0){
                return $d1 * $d2;
            }
        case '/':
            return $d1 / $d2;
        default:
            return null;
    }
}

/**
 * Решение задачи 28 урока
 * @param int $lastNum
 * @return void
 */
function printNumbers(int $lastNum): void
{
    while ($lastNum >= 1){
        print_r($lastNum-- . "\n");
    }
    print_r('finished!');
}

/**
 * Решение задачи 29 урока
 * @param int $start
 * @param int $finish
 * @return string
 */
function joinNumbersFromRange(int $start, int $finish): string
{
    $str = '';

    while ($start <= $finish){
        $str .= $start++;
    }

    return $str;
}

/**
 * Решение задачи 30 урока
 * @param string $str
 * @param int $start
 * @param int $length
 * @return bool
 */
function isArgumentsForSubstrCorrect(string $str, int $start, int $length): bool
{
    $lengthTrue = strlen($str);

    if ($length < 0 || $start < 0 || $start >= $lengthTrue || ($start + $length) > $lengthTrue ){
        return false;
    }

    return true;
}

/**
 * Решение задачи 31 урока
 * @param int $start
 * @param int $finish
 * @return int
 */
function sumOfSeries(int $start, int $finish): int
{
    $summ = 0;

    for ($i = $start; $i <= $finish; $i++){
        $summ += $i;
    }

    return $summ;
}

/**
 * Решение задачи 32 урока
 * @param string $text
 * @return string
 */
function invertCase(string $text): string
{
    $length = mb_strlen($text);
    $res = '';

    for ($i = 0; $i < $length; $i++){

        $chr = mb_substr($text, $i, 1);

        if (mb_strtoupper($chr) === $chr){
            $chr = mb_strtolower($chr);
        } elseif (mb_strtolower($chr) === $chr){
            $chr = mb_strtoupper($chr);
        }

        $res .= $chr;

    }

    return $res;
}

/**
 * Решение задачи 33 урока
 * @param int $timeStamp
 * @return string
 */
function getCustomDate(int $timeStamp): string
{
    return date('d/m/Y', $timeStamp);
}


/**
 * Решение задачи 34 урока
 * @param string $word
 * @return bool
 */
function isPalindrome_1(string $word): bool
{
    $lenght = mb_strlen($word);
    $wordReverse = '';

    for ($i = 0; $i < $lenght; $i++){
        $wordReverse = mb_substr($word, $i, 1) . $wordReverse;
    }

    return $wordReverse == $word;
}

/**
 * Решение задачи 35 урока
 * @return void
 */
function generateError(): void
{
    funcErr();
}

/**
 * Решение задачи 36 урока
 * @param string $word
 * @return bool
 */
function isPalindrome(string $word): bool
{
    require_once 'Strings.php';
    return $word == \Strings\reverse($word);
}

/**
 * Решение задачи 37 урока
 * @return string
 */
function hello(): string
{
    return 'solution';
}


use function App\Symbols\isVowel;

/**
 * Решение задачи 38 урока
 * @param string $str
 * @return int
 */
function countVowels(string $str): int
{
    $len = strlen($str);
    $count = 0;

    for ($i = 0; $i < $len; $i++){
        $count += isVowel($str[$i]) ? 1 : 0;
    }

    return $count;
}

//debug(countVowels('One'));
//debug(countVowels('London is the capital of Great Britain'));

//debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ),1);