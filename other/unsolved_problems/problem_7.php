<?php

function encode_string(string $string, int $shift): string
{
    $alphabet = "абвгдеёжзийклмнопрстуфхцчшщъыьэюя";
    $stringArray = mb_str_split($string);
    print_r($stringArray);
    $resultStringArray = [];
    for ($i = 0; $i<count($stringArray); $i++){
        $alphabetIndex = strpos($alphabet, $stringArray[$i]);
        echo $alphabetIndex;
        $resultStringArray[] = $alphabet[$alphabetIndex + $shift];
        print_r($resultStringArray);
    }
    return implode($resultStringArray);
}


$inputString = "абвгде";
$inputNum	= 1;
echo encode_string($inputString, $inputNum) . PHP_EOL;
?>