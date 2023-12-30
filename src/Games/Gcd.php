<?php

namespace BrainGames\Games\Gcd;

use BrainGames\Engine;

function getQuestionAndDivisor()
{
    $firstNumber = rand(1, 100);
    $secondNumber = rand(1, 100);
    $commonDivisor = 1;
    $numbers = [$firstNumber, $secondNumber];
    $question = implode(' ', $numbers);
    for ($i = min($numbers); $i >= 1; $i--) {
        if ($firstNumber % $i === 0 && $secondNumber % $i === 0) {
            $commonDivisor = $i;
            break;
        }
    }
    return ["Question" => $question, "Correct" => $commonDivisor];
}

function run()
{
    $gameRounds = Engine\getGameRounds();
    $questionsAndAnswers = [];
    for ($i = 0; $i < $gameRounds; $i++) {
        $questionsAndAnswers[] = getQuestionAndDivisor();
    }
    $gameType = "Find the greatest common divisor of given numbers.";
    Engine\processGame($gameType, $questionsAndAnswers);
}
