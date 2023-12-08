<?php

namespace BrainGames\EvenCheck;

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
        $answer = prompt("Question: {$randomNumber}");
        line("Your answer is %s!", $answer);
        if ($correctAnswer === strtolower($answer)) {
            echo "Correct!\n";
            $amountOfCorrectAnswers += 1;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Lets try it again, %s!", $playersName);
            $amountOfCorrectAnswers = 0;
        }
    }
    line("Congratulations, %s!", $playersName);
}
