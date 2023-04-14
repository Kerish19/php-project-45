<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

const DESCRIPTION_GAME = 'What is the result of the expression?';

function randomOperation()
{
    $operations = ['+', '-', '*'];
    $randIndex = rand(0, count($operations) - 1);
    return $operations[$randIndex];
}

function calcExpression(int $firstOperand, int $secondOperand, string $opeation)
{
    if ($opeation === '+') {
        return $firstOperand + $secondOperand;
    }
    if ($opeation === '-') {
        return $firstOperand - $secondOperand;
    }
    return $firstOperand * $secondOperand;
}

function startBrainCalc()
{
    $genGameTask = function () {
        $firstOperand = rand(1, 10);
        $secondOperand = rand(1, 10);
        $opeation = randomOperation();
        $gameQuestion = "{$firstOperand} {$opeation} {$secondOperand}";
        $answerQuestion = (string) calcExpression($firstOperand, $secondOperand, $opeation);
        return [$gameQuestion, $answerQuestion];
    };

    runGame(DESCRIPTION_GAME, $genGameTask);
}
