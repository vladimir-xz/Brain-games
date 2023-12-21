<?php

namespace BrainGames\Games\Calculate;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;

function getEquationAndAnswer()
{
    $firstNumber = rand(1, 10);
    $secondNumber = rand(1, 10);
    $signs = ["+", "-", "*"];
    $question = "";
    $correctAnswer = 0;
    $choosenSign = $signs[rand(0, 2)];
    $numbersAndSign = [$firstNumber, $choosenSign, $secondNumber];
    $question = implode(' ', $numbersAndSign);
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
    [$gameScore, $gameGoal] = Engine\setGameData();
    line("What is the result of the expression?");
    do {
        $gameTaskAndAnswer = getEquationAndAnswer();
        $question = $gameTaskAndAnswer["Question"];
        $correctAnswer = $gameTaskAndAnswer["Correct"];
        $ifContinue = Engine\processGame($name, $question, $correctAnswer, $gameScore, $gameGoal);
    } while ($ifContinue);
}
