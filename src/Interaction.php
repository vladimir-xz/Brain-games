<?php

namespace BrainGames\Interaction;

use function cli\line;
use function cli\prompt;

function setScore()
{
    return [0, true];
}

function gameBegining($gameType)
{
    switch ($gameType) {
        case 'Evengame':
            line("Answer \"yes\" if the number is even, otherwise answer \"no\"");
            break;
        case 'Calculate':
            line("What is the result of the expression?");
            break;
        case 'Gcd':
            line("Find the greatest common divisor of given numbers.");
            break;
    }
}

function getAnswer($question)
{
    line("Question: %s", $question);
    $answer = prompt("Your answer is ");
    return $answer;
}

function checkIfCorrect($answer, $correctAnswer, $gamePoints)
{
    $ifContinue = false;
    if ($answer == $correctAnswer) {
        $gamePoints += 1;
        line("Correct!");
        $ifContinue = true;
    }
    return ["Status" => $ifContinue, "Score" => $gamePoints];
}

function endGame($gamePoints, $playerName, $answer, $correctAnswer)
{
    if ($gamePoints === 3) {
        line("Congratulations, %s!", ucfirst($playerName));
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
        line("Lets try it again, %s!", ucfirst($playerName));
    }
}
