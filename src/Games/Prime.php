<?php

namespace BrainGames\Games\Prime;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;

function defineIfPrime(int $number)
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function getQuestionAndIfPrime()
{
    $number = rand(2, 100);
    $correctAnswer = defineIfPrime($number) ? "yes" : "no";
    return ["Question" => $number, "Correct" => $correctAnswer];
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
