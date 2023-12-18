<?php

namespace BrainGames\Engine;

use BrainGames\Games\Progression;
use BrainGames\Games\Even;
use BrainGames\Games\Gcd;
use BrainGames\Games\Prime;
use BrainGames\Games\Calculate;
use BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function setGameData()
{
    return [0, true];
}

function startGame(string $gameType)
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
    }
}

function endGame(int $gamePoint, string $playerName, string $answer, string $correctAnswer)
{
    if ($gamePoint === 3) {
        line("Congratulations, %s!", ucfirst($playerName));
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
        line("Let's try again, %s!", ucfirst($playerName));
    }
}

function askAnswer(string $question)
{
    line("Question: %s", $question);
    $answer = prompt("Your answer is ");
    return $answer;
}

function checkAnswer(string $answer, string $correctAnswer, int $gamePoint)
{
    $ifContinue = true;
    if ($answer == $correctAnswer) {
        line("Correct!");
        $gamePoint += 1;
    } else {
        $ifContinue = false;
    }
    return ["Status" => $ifContinue, "Point" => $gamePoint];
}

function run(string $gameType)
{
    $gameObjective = 0;
    $name = Cli\askForName();
    [$gamePoint, $ifContinue] = setGameData();
    startGame($gameType);
    do {
        switch ($gameType) {
            case 'Progression':
                $gameObjective = Progression\findMissingNumber();
                break;
            case 'Prime':
                $gameObjective = Prime\getQuestionAndIfPrime();
                break;
            case 'Calculate':
                $gameObjective = Calculate\getEquationAndAnswer();
                break;
            case 'Even':
                $gameObjective = Even\getEvenNumberAndAnswer();
                break;
            case 'Gcd':
                $gameObjective = Gcd\getQuestionAndDivisor();
                break;
        }
        $question = $gameObjective["Question"];
        $correctAnswer = $gameObjective["Correct"];
        $answer = askAnswer($question);
        $gameResult = checkAnswer($answer, $correctAnswer, $gamePoint);
        $gamePoint = $gameResult["Point"];
        $ifContinue = $gameResult["Status"];
    } while ($ifContinue && $gamePoint < 3);
    endGame($gamePoint, $name, $answer, $correctAnswer);
}
