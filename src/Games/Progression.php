<?php

namespace BrainGames\Games\Progression;

use BrainGames\Engine;

function getProgressionAndNumber()
{
    $numberCount = rand(5, 10);
    $missingPosition = rand(0, $numberCount - 1);
    $number = rand(1, 50);
    $addingNumber = rand(1, 10);
    $progression = [];
    for ($i = 0; $i < $numberCount; $i++) {
        $progression[] = $number;
        $number = $number + $addingNumber;
    }
    $answer = $progression[$missingPosition];
    $progression[$missingPosition] = "..";
    $question = implode(" ", $progression);
    return ["Question" => $question, "Correct" => $answer];
}

function run()
{
    $gameRounds = Engine\getGameRounds();
    $questionsAndAnswers = [];
    for ($i = 0; $i < $gameRounds; $i++) {
        $questionsAndAnswers[] = getProgressionAndNumber();
    }
    $gameRule = "What number is missing in the progression?";
    Engine\processGame($gameRule, $questionsAndAnswers);
}
