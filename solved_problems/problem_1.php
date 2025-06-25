<?php


/** 
 * 
 * Дана строка, содержащая в себе дробь:
 * '12/16'
 * 
 * Напишите код, который распишет процесс сокращения дроби, как в школе:
 * '12/16 = 6/8 = 3/4'
 * 
*/

declare(strict_types=1);

function getFractionReductionSteps(string $input): string{
    $output = $input;
    $numbers = explode('/', $input);

    for($i = 2; $i < 10; $i++){
        if(($numbers[0] % $i == 0) && ($numbers[1] % $i == 0) ){
            $numbers[0] /= $i;
            $numbers[1] /= $i;
            $output = $output." = ".$numbers[0]."/".$numbers[1];
            $i = 1;
        }
    }
    return $output;
}


// $input = '12/16';

// echo getFractionReductionSteps($input).PHP_EOL;
