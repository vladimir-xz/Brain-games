<?php

namespace BrainGames\EvenGame;

use function cli\line;
use function cli\prompt;

function askIfEven($playersName)
{
    echo "Answer \"yes\" if the number is even, otherwise answer \"no\"\n";
    $amountOfCorrectAnswers = 0;
    while ($amountOfCorrectAnswers < 3) {
        $randomNumber = rand(1, 100);
        $ifRandomIsEven = $randomNumber % 2 === 0;
        $correctAnswer = "no";
        if ($ifRandomIsEven === true) {
            $correctAnswer = "yes";
        }
        line("Question: %s", $randomNumber);
        $answer = prompt("Your answer is ");
        if ($correctAnswer === strtolower($answer)) {
            echo "Correct!\n";
            $amountOfCorrectAnswers += 1;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Lets try it again, %s!", ucfirst($playersName));
            break;
        }
    }
    if ($amountOfCorrectAnswers === 3) {
        line("Congratulations, %s!", ucfirst($playersName));
    }
}
