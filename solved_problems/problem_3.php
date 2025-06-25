<?php
require_once 'problem_1.php';
/*
 Дана строка, содержащая две дроби и математическую операцию между ними:
'2/3 + 3/4'

Напишите код, который вычислит результат записанной математической операции. 
*/

function calculateFractionExpression($input)
{
    $expressionArray = explode(' ', $input);

    $fractionNumsL = explode('/', $expressionArray[0]);
    $fractionNumsR = explode('/', $expressionArray[2]);

    switch ($expressionArray[1]) {
        case '+':
        case '-':
            if ($fractionNumsL[1] !== $fractionNumsR[1]) {
                $fractionNumsL[0] *= $fractionNumsR[1];
                $fractionNumsR[0] *= $fractionNumsL[1];

                $temp = $fractionNumsL[1] * $fractionNumsR[1];
                $fractionNumsL[1] = $temp;
                $fractionNumsR[1] = $temp;
            }

            $left_numb = ($expressionArray[1] == '-') ?
                $fractionNumsL[0] - $fractionNumsR[0] :
                $fractionNumsL[0] + $fractionNumsR[0];

            return $left_numb
                . '/' .
                $fractionNumsL[1];

            break;
        case '*':
            return ($fractionNumsL[0] * $fractionNumsR[0])
                . '/' .
                ($fractionNumsL[1] * $fractionNumsR[1]);
            break;
        case '/';
            return ($fractionNumsL[0] * $fractionNumsR[1])
                . '/' .
                ($fractionNumsL[1] * $fractionNumsR[0]);
            break;
    }
}

$input = '2/3 - 3/4';

echo getFractionReductionSteps(calculateFractionExpression($input)) . PHP_EOL;
