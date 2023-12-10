<?php

namespace BrainGames\Games\Gcd;

function findDivisor()
{
    $firstNumber = rand(1, 100);
    $secondNumber = rand(1, 100);
    $commomDivisor = 1;
    $numbers = [$firstNumber, $secondNumber];
    sort($numbers);
    for ($i = 1; $i <= $numbers[0]; $i += $commomDivisor) {
        if ($firstNumber % $i === 0 && $secondNumber % $i === 0) {
            $commomDivisor = $i;
        }
    }
    return ["Question" => "{$firstNumber} {$secondNumber}", "Correct" => $commomDivisor];
}
