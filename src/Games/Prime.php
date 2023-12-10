<?php

namespace BrainGames\Games\Prime;

function getQuestionAndIfPrime()
{
    $number = rand(2, 100);
    $correctAnswer = "yes";
    $controlGroup = [2, 3, 5, 7];
    if (in_array($number, $controlGroup, true)) {
        return ["Question" => $number, "Correct" => $correctAnswer];
    }
    foreach ($controlGroup as $controlNumber) {
        if ($number % $controlNumber === 0) {
            $correctAnswer = "no";
            break;
        }
    }
    return ["Question" => $number, "Correct" => $correctAnswer];
}
