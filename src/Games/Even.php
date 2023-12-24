<?php

namespace BrainGames\Games\Even;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;

function getEvenNumberAndResult()
{
    $randomNumber = rand(1, 100);
    $ifRandomIsEven = $randomNumber % 2 === 0;
    $ifRandomIsEven === true ? $correctAnswer = "yes" : $correctAnswer = "no";
    return ["Question" => $randomNumber, "Correct" => $correctAnswer];
}

function run()
{
    $name = Cli\askForName();
    $gameRounds = Engine\getGameRounds();
    $questionsAndAnswers = [];
    for ($i = 0; $i < $gameRounds; $i++) {
        $questionsAndAnswers[] = getEvenNumberAndResult();
    }
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    Engine\processGame($name, $questionsAndAnswers);
}
