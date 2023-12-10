<?php

namespace BrainGames\Games\Prime;

function findIfPrime()
{
    $number = rand(2, 100);
    $correctAnswer = "yes";
    $controlGroup = [2, 3, 5, 7];
    if (in_array($number, $controlGroup)) {
        return ["Question" => $number, "Correct" => $correctAnswer];
    }
    for ($i = 0; $i < count($controlGroup); $i++) {
        if ($number % $controlGroup[$i] === 0) {
            $correctAnswer = "no";
        }
    }
    return ["Question" => $number, "Correct" => $correctAnswer];
}
