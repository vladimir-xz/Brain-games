<?php

namespace BrainGames\Games\Even;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;

function getEvenNumberAndResult()
{
    $randomNumber = rand(1, 100);
    $ifRandomIsEven = $randomNumber % 2 === 0;
    $correctAnswer = "no";
    if ($ifRandomIsEven === true) {
        $correctAnswer = "yes";
    }
    return ["Question" => $randomNumber, "Correct" => $correctAnswer];
}

function run()
{
    $name = Cli\askForName();
    ["Score" => $gameScore, "Goal" => $gameGoal] = Engine\setGameData();
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    do {
        ["Question" => $question, "Correct" => $correctAnswer] = getEvenNumberAndResult();
        $ifContinue = Engine\processGame($name, $question, $correctAnswer, $gameScore, $gameGoal);
    } while ($ifContinue);
}
