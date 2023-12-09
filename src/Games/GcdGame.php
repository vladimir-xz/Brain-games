<?php

namespace BrainGames\Games\Gcd;

function findDivisor()
{
    $firstNumber = 5;
    $secondNumber = 50;
    $commomDivisors = [];
    for ($i = 1; $i <= $firstNumber; $i++) {
        if ($firstNumber % $i === 0 && $secondNumber % $i === 0) {
            $commomDivisors = $i;
        }
    }
    return ["Question" => "{$firstNumber} {$secondNumber}", "Correct" => $commomDivisors];
}

$result = findDivisor();
$correct = $result["Correct"];
$question = $result["Question"];
