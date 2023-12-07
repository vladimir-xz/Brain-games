<?php

namespace BrainGames\Cli;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function askForName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
