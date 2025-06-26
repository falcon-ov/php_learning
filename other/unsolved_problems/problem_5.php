<?php
/*
2 kyu
Evaluate mathematical expression    
CodeWars
calcExpr()
*/

function calcSimple($item){
    
}

$input = [
    "1-1", 
    "1 -1",
    "1- 1",
    "1 - 1",
    "1- -1",
    "1 - -1",
    "1--1",
    "6 + -(4)",
    "6 + -( -4)"
];

foreach($input as $item){
    calcSimple($item);
}