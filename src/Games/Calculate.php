<?php

namespace BrainGames\Games\Calculate;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;

function getEquationAndResult()
{
    $firstNumber = rand(1, 10);
    $secondNumber = rand(1, 10);
    $signs = ["+", "-", "*"];
    $signsCount = count($signs) - 1;
    $choosenSign = $signs[rand(0, $signsCount)];
    $question = implode(' ', [$firstNumber, $choosenSign, $secondNumber]);
    switch ($choosenSign) {
        case '+':
            $correctAnswer = $firstNumber + $secondNumber;
            break;
        case '-':
            $correctAnswer = $firstNumber - $secondNumber;
            break;
        case '*':
            $correctAnswer = $firstNumber * $secondNumber;
            break;
        default:
            throw new \Exception("Unknown order state: \"{$choosenSign}\"!");
    }
    return ["Question" => $question, "Correct" => $correctAnswer];
}

function run()
{
    $name = Cli\askForName();
    $gameRounds = Engine\getGameRounds();
    $questionsAndAnswers = [];
    for ($i = 0; $i < $gameRounds; $i++) {
        $questionsAndAnswers[] = getEquationAndResult();
    }
    Engine\printRules("Calculate");
    Engine\processGame($name, $questionsAndAnswers);
}
