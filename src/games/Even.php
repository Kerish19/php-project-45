<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

const DESCRIPTION_GAME = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function startBrainEven()
{
    $genGameTask = function () {
        $gameQuestion = rand(1, 20);
        $answerQuestion = isEven($gameQuestion) ? 'yes' : 'no';
        return [$gameQuestion, $answerQuestion];
    };

    runGame(DESCRIPTION_GAME, $genGameTask);
}
