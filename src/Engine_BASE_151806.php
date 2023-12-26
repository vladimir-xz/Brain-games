<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function getGameRounds()
{
    return 3;
}

function processGame(string $playerName, array $questionsAndAnswers)
{
    foreach ($questionsAndAnswers as ["Question" => $question, "Correct" => $correctAnswer]) {
        line("Question: %s", $question);
        $answer = prompt("Your answer is ");
        if (strtolower($answer) == $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            return line("Let's try again, %s!", ucfirst($playerName));
        }
    }
    line("Congratulations, %s!", ucfirst($playerName));
}
