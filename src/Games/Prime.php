<?php

namespace BrainGames\Games\Prime;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;

function getQuestionAndIfPrime()
{
    $number = rand(2, 100);
    $correctAnswer = "yes";
    $controlNumbers = [2, 3, 5, 7];
    if (in_array($number, $controlNumbers, true)) {
        return ["Question" => $number, "Correct" => $correctAnswer];
    }
    foreach ($controlNumbers as $controlNumber) {
        if ($number % $controlNumber === 0) {
            $correctAnswer = "no";
            break;
        }
    }
    return ["Question" => $number, "Correct" => $correctAnswer];
}

function run()
{
    $name = Cli\askForName();
    [$gameScore, $gameGoal] = Engine\setGameData();
    line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
    do {
        $gameTaskAndAnswer = getQuestionAndIfPrime();
        $question = $gameTaskAndAnswer["Question"];
        $correctAnswer = $gameTaskAndAnswer["Correct"];
        $ifContinue = Engine\processGame($name, $question, $correctAnswer, $gameScore, $gameGoal);
    } while ($ifContinue);
}
