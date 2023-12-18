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
        case 'Evengame':
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

function checkAnswer($answer, $correctAnswer, $gamePoint)
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

function run($gameType)
{
    $name = Cli\askForName();
    [$gamePoint, $ifContinue] = setGameData();
    startGame($gameType);
    while ($ifContinue && $gamePoint < 3) {
        switch ($gameType) {
            case 'Progression':
                $gameEquation = Progression\findMissingNumber();
                break;
            case 'Prime':
                $gameEquation = Prime\getQuestionAndIfPrime();
                break;
            case 'Calculate':
                $gameEquation = Calculate\getEquationAndAnswer();
                break;
            case 'Even':
                $gameEquation = Even\getEvenNumberAndAnswer();
                break;
            case 'Gcd':
                $gameEquation = Gcd\getQuestionAndDivisor();
                break;
        }
        $question = $gameEquation["Question"];
        $correctAnswer = $gameEquation["Correct"];
        $answer = askAnswer($question);
        $gameResult = checkAnswer($answer, $correctAnswer, $gamePoint);
        $gamePoint = $gameResult["Point"];
        $ifContinue = $gameResult["Status"];
    }
    endGame($gamePoint, $name, $answer, $correctAnswer);
}
