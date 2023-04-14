<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\runGame;

const DESCRIPTION_GAME = 'Find the greatest common divisor of given numbers.';

function calcGCD(int $firstOperand, int $secondOperand)
{
    $gcd = 1;
    $minOperand = $firstOperand < $secondOperand ? $firstOperand : $secondOperand;

    for ($i = 1; $i <= $minOperand; $i++) {
        if ($firstOperand % $i === 0 && $secondOperand % $i === 0) {
            $gcd = $i;
        }
    }

    return $gcd;
}

function startGCD()
{
    $genGameTask = function () {
        $firstOperand = rand(1, 10);
        $secondOperand = rand(1, 10);
        $gameQuestion = "{$firstOperand} {$secondOperand}";
        $answerQuestion = (string) calcGCD($firstOperand, $secondOperand);
        return [$gameQuestion, $answerQuestion];
    };

    runGame(DESCRIPTION_GAME, $genGameTask);
}
