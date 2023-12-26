<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function getGameRounds()
{
    return 3;
}

function printRules($gameType)
{
    switch ($gameType) {
        case 'Even':
            line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
            break;
        case 'Calculate':
            line("What is the result of the expression?");
            break;
        case 'Gcd':
            line("Find the greatest common divisor of given numbers.");
            break;
        case 'Progression':
            line("What number is missing in the progression?");
            break;
        case 'Prime':
            line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
            break;
        default:
            throw new \Exception("Unknown order state: \"{$gameType}\"!");
    }
}

function processGame(string $playerName, array $questionsAndAnswers)
{
    foreach ($questionsAndAnswers as ["Question" => $question, "Correct" => $correctAnswer]) {
        line("Question: %s", $question);
        $answer = prompt("Your answer is ");
        if (mb_strtolower($answer) == $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            return line("Let's try again, %s!", ucfirst($playerName));
        }
    }
    line("Congratulations, %s!", ucfirst($playerName));
}
