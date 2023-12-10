<?php

namespace BrainGames\Games\Calculate;

function getEquationAndAnswer()
{
    $firstNumber = rand(1, 10);
    $secondNumber = rand(1, 10);
    $signs = ["+", "-", "*"];
    $choosenSign = $signs[rand(0, 2)];
    $question = "{$firstNumber} {$choosenSign} {$secondNumber}";
    $correctAnswer = 0;
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
