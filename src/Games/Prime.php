<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

const DESCRIPTION_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function startBrainPrime()
{
    $genGameTask = function () {
        $gameQuestion = rand(1, 100);
        $answerQuestion = isPrime($gameQuestion) ? 'yes' : 'no';
        return [$gameQuestion, $answerQuestion];
    };

    runGame(DESCRIPTION_GAME, $genGameTask);
}
