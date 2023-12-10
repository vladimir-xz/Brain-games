<?php

namespace BrainGames\Games\Progression;

function findMissingNumber()
{
    $NumberCount = rand(5, 10);
    $missingPosition = rand(1, $NumberCount);
    $number = rand(1, 50);
    $addingNumber = rand(1, 10);
    $progression = [];
    $progression[] = $number;
    for ($i = 1; $i < $NumberCount; $i++) {
        $number = $number + $addingNumber;
        $progression[] = $number;
    }
    $answer = $progression[$missingPosition - 1];
    $progression[$missingPosition - 1] = "..";
    $question = implode(" ", $progression);
    return ["Question" => $question, "Correct" => $answer];
}
