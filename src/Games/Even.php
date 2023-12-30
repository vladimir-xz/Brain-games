<?php

namespace BrainGames\Games\Even;

use BrainGames\Engine;

function getEvenNumberAndResult()
{
    $randomNumber = rand(1, 100);
    $ifRandomIsEven = $randomNumber % 2 === 0;
    $correctAnswer = $ifRandomIsEven ? "yes" : "no";
    return ["Question" => $randomNumber, "Correct" => $correctAnswer];
}

function run()
{
    $gameRoundCount = Engine\getGameRounds();
    $questionsAndAnswers = [];
    for ($i = 0; $i < $gameRoundCount; $i++) {
        $questionsAndAnswers[] = getEvenNumberAndResult();
    }
    $gameRule = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    Engine\processGame($gameRule, $questionsAndAnswers);
}
