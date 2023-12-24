<?php

namespace BrainGames\Games\Progression;

use BrainGames\Cli;
use BrainGames\Engine;

use function cli\line;

function getProgressionAndNumber()
{
    $numberCount = rand(5, 10);
    $missingPosition = rand(0, $numberCount - 1);
    $number = rand(1, 50);
    $addingNumber = rand(1, 10);
    $progression = [];
    $progression[] = $number;
    for ($i = 1; $i < $numberCount; $i++) {
        $number = $number + $addingNumber;
        $progression[] = $number;
    }
    $answer = $progression[$missingPosition];
    $progression[$missingPosition] = "..";
    $question = implode(" ", $progression);
    return ["Question" => $question, "Correct" => $answer];
}

function run()
{
    $name = Cli\askForName();
    $gameRounds = Engine\getGameRounds();
    $questionsAndAnswers = [];
    for ($i = 0; $i < $gameRounds; $i++) {
        $questionsAndAnswers[] = getProgressionAndNumber();
    }
    line("What number is missing in the progression?");
    Engine\processGame($name, $questionsAndAnswers);
}
