<?php

namespace BrainGames\Games\Prime;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;

function getControlNumbers()
{
    $number = rand(2, 100);
    in_array($number, [2, 3, 5, 7], true) ? $correctAnswer = "yes" : $correctAnswer = "no";
    return ["Question" => $number, "Correct" => $correctAnswer];
}

function getQuestionAndIfPrime()
{
    ["Question" => $number, "Correct" => $correctAnswer] = getControlNumbers();
    if ($correctAnswer === "no") {
        $controlNumbers = [2, 3, 5, 7];
        foreach ($controlNumbers as $controlNumber) {
            if ($number % $controlNumber === 0) {
                return ["Question" => $number, "Correct" => $correctAnswer];
            }
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
