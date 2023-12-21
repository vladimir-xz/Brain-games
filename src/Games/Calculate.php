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
    $choosenSign = $signs[rand(0, 2)];
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
    }
    return ["Question" => $question, "Correct" => $correctAnswer];
}

function run()
{
    $name = Cli\askForName();
    ["Score" => $gameScore, "Goal" => $gameGoal] = Engine\setGameData();
    line("What is the result of the expression?");
    do {
        ["Question" => $question, "Correct" => $correctAnswer] = getEquationAndResult();
        $ifContinue = Engine\processGame($name, $question, $correctAnswer, $gameScore, $gameGoal);
    } while ($ifContinue);
}
