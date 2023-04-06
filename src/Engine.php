<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_ROUNDS = 3;

function runGame(string $descriptionGame, callable $genGameTask): void
{
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line($descriptionGame);
    for ($i = 0; $i < NUMBER_ROUNDS; $i++) {
        $gameTask = $genGameTask();
        [$question, $correctAnswer] = $gameTask;
        line("Question: %s", $question);
        $answerUser = prompt('Your answer');
        if ($answerUser === $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answerUser, $correctAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }
    }
    line("Congratulations, %s!", $userName);
}
