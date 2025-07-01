<?php
/*
Есть матрица 3 × 3. Посчитайте диагонали, только парные / нечетные числа в диагоналях.
 */

$matrix = [
    [2, 2, 3],
    [1, 2, 3],
    [1, 2, 3]
];

function isEven($n)
{
    return ($n % 2 == 0) ? $n : 0;
}

function isOdd($n)
{
    return ($n % 2 == 0) ? 0 : $n;
}

$sum1 = 0;
$sum2 = 0;
for ($i = 0; $i < 3; $i++){
    $sum1 += isOdd($matrix[$i][$i]);
}
for ($i = 2,$j = 0; $i >= 0 && $j < 3; $i--, $j++){
    $sum2 += isOdd($matrix[$j][$i]);
}

echo "sum of odd numbers".PHP_EOL;
echo "up_left to right_down: ".$sum1.PHP_EOL;
echo "down_left to right_up: ".$sum2.PHP_EOL;