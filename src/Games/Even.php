<?php

namespace BrainGames\Games\Even;

function getEvenNumberAndAnswer()
{
    $randomNumber = rand(1, 100);
    $ifRandomIsEven = $randomNumber % 2 === 0;
    $correctAnswer = "no";
    if ($ifRandomIsEven === true) {
        $correctAnswer = "yes";
    }
    return ["Question" => $randomNumber, "Correct" => $correctAnswer];
}
