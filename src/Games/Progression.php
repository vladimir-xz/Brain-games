<?php

namespace BrainGames\Games\Progression;

function findMissingNumber()
{
    $amountOfNumbers = rand(5, 10);
    $missingNumber = rand(1, $amountOfNumbers);
    $currentNumber = rand(1, 50);
    $addingNumber = rand(1, 10);
    $progression[] = $currentNumber;
    for ($i = 1; $i < $amountOfNumbers; $i++) {
        $currentNumber = $currentNumber + $addingNumber;
        $progression[] = $currentNumber;
    }
    $answer = $progression[$missingNumber - 1];
    $progression[$missingNumber - 1] = "..";
    $question = implode(" ", $progression);
    return ["Question" => $question, "Correct" => $answer];
}
