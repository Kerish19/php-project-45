<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

const DESCRIPTION_GAME = 'What number is missing in the progression?';

function genProgression()
{
    $lengthProgression = rand(5, 10);
    $value = rand(1, 10);
    $stepProgression = rand(1, 10);
    $progression = [];

    for ($i = 0; $i < $lengthProgression; $i++) {
        $progression[$i] = $value;
        $value += $stepProgression;
    }

    $positionQuestion = rand(0, $lengthProgression - 1);
    $answerQuestion = (string) $progression[$positionQuestion];
    $progression[$positionQuestion] = '..';
    $gameQuestion = implode(' ', $progression);

    return [$gameQuestion, $answerQuestion];
}

function startProgression()
{
    $genGameTask = function () {
        return [$gameQuestion, $answerQuestion] = genProgression();
    };

    runGame(DESCRIPTION_GAME, $genGameTask);
}
