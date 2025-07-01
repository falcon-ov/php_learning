<?php
/*

Есть массив Integer, напишите возможные способы, как увеличить каждый элемент на единицу (1)

 */

$integers = [1, 2, 3, 4, 5, 6, 7, 8, 9];

#1 способ
$integers1 = array_map(function ($n){
    return ++$n;
}, $integers);
print_r($integers1);

#2 способ - короче
$integers2 = array_map(fn($n) => ++$n, $integers);
print_r($integers2);

#3 способ - с помощью foreach
