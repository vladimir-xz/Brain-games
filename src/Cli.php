<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function askForName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
