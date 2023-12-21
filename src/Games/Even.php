<?php

namespace BrainGames\Games\Even;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;

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

function run()
{
    $name = Cli\askForName();
    [$gameScore, $gameGoal] = Engine\setGameData();
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    do {
        $gameTaskAndAnswer = getEvenNumberAndAnswer();
        $question = $gameTaskAndAnswer["Question"];
        $correctAnswer = $gameTaskAndAnswer["Correct"];
        $ifContinue = Engine\processGame($name, $question, $correctAnswer, $gameScore, $gameGoal);
    } while ($ifContinue);
}
