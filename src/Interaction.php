<?php

namespace BrainGames\Interaction;

use function cli\line;
use function cli\prompt;

function gameBegining($gameType)
{
    switch ($gameType) {
        case 'evengame':
            line("Answer \"yes\" if the number is even, otherwise answer \"no\"\n");
            break;
        case 'calculator':
            line("What is the result of the expression?");
            break;
    }
    return 0;
}

function questionAndAnswer($question)
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
