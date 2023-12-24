<?php

namespace BrainGames\Games\Gcd;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;

function getQuestionAndDivisor()
{
    $firstNumber = rand(1, 100);
    $secondNumber = rand(1, 100);
    $commonDivisor = 1;
    $numbers = [$firstNumber, $secondNumber];
    $question = implode(' ', $numbers);
    sort($numbers);
    for ($i = $numbers[0]; $i >= 1; $i -= 1) {
        if ($firstNumber % $i === 0 && $secondNumber % $i === 0) {
            $commonDivisor = $i;
            break;
        }
    }
    return ["Question" => $question, "Correct" => $commonDivisor];
}

function run()
{
    $name = Cli\askForName();
    $gameRounds = Engine\getGameRounds();
    $questionsAndAnswers = [];
    for ($i = 0; $i < $gameRounds; $i++) {
        $questionsAndAnswers[] = getQuestionAndDivisor();
    }
    line("Find the greatest common divisor of given numbers.");
    Engine\processGame($name, $questionsAndAnswers);
}
