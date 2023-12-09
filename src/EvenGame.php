<?php

namespace BrainGames\EvenGame;

function askIfEven($playersName)
{
    $randomNumber = rand(1, 100);
    $ifRandomIsEven = $randomNumber % 2 === 0;
    $correctAnswer = "no";
    if ($ifRandomIsEven === true) {
        $correctAnswer = "yes";
    }
    return ["Number" => $randomNumber, "Correct" => $correctAnswer];
}
