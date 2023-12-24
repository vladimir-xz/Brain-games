<?php

namespace BrainGames\Games\Prime;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;

function getQuestionAndIfPrime()
{
    $number = rand(2, 100);
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return ["Question" => $number, "Correct" => "no"];
        }
    }
    return ["Question" => $number, "Correct" => "yes"];
}

function run()
{
    $name = Cli\askForName();
    $gameRounds = Engine\getGameRounds();
    $questionsAndAnswers = [];
    for ($i = 0; $i < $gameRounds; $i++) {
        $questionsAndAnswers[] = getQuestionAndIfPrime();
    }
    line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
    Engine\processGame($name, $questionsAndAnswers);
}
