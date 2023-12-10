<?php

namespace BrainGames\Games\Calculate;

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
