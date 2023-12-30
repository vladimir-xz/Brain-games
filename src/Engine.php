<?php

namespace BrainGames\Engine;

use BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function getGameRounds()
{
    return 3;
}

function processGame(string $gameRule, array $questionsAndAnswers)
{
    $playerName = Cli\askForName();
    line($gameRule);
    foreach ($questionsAndAnswers as ["Question" => $question, "Correct" => $correctAnswer]) {
        line("Question: %s", $question);
        $answer = prompt("Your answer is ");
        if (mb_strtolower($answer) != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", ucfirst($playerName));
            return;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", ucfirst($playerName));
}
