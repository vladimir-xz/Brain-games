<?php

namespace BrainGames\Games\Gcd;

function getQuestionAndDivisor()
{
    $firstNumber = rand(1, 100);
    $secondNumber = rand(1, 100);
    $commonDivisor = 1;
    $numbers = [$firstNumber, $secondNumber];
    sort($numbers);
    for ($i = 1; $i <= $numbers[0]; $i += $commonDivisor) {
        if ($firstNumber % $i === 0 && $secondNumber % $i === 0) {
            $commonDivisor = $i;
        }
    }
    return ["Question" => "{$firstNumber} {$secondNumber}", "Correct" => $commonDivisor];
}
