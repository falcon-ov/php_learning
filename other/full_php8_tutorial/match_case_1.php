<?php

//Задание: Калькулятор операций
//Напишите программу на PHP, которая запрашивает у пользователя два числа и операцию (+, -, *, /).
//Используя конструкцию match, определите, какую операцию выбрал пользователь,
//и выполните соответствующее арифметическое действие.
//Выведите результат или сообщение об ошибке, если операция не поддерживается или деление на ноль.
$input = [];

try{
    echo "Введите два числа и операцию (+, -, *, /)".PHP_EOL;
    echo "_ _ _".PHP_EOL;
    echo "Введите первое число: ";
    $input[] = trim(fgets(STDIN));
    $input[0] = is_numeric($input[0]) ? (float)$input[0] : throw new \Error("Ошибка: ожидается число");
    echo $input[0]." _ _".PHP_EOL;
    echo "Введите второе число: ";
    $input[] = trim(fgets(STDIN));
    $input[1] = is_numeric($input[1]) ? (float)$input[1] : throw new \Error("Ошибка: ожидается число");
    echo $input[0]." _ ".$input[1].PHP_EOL;
    echo "Введите одну из операций (+, -, *, /): ";
    $input[] = trim(fgets(STDIN));
    echo $input[0]." $input[2] ".$input[1]." = ";
}
catch(\Error $e){
    echo $e->getMessage();
    exit;
}


$result = match ($input[2]){
    '+' => $input[0] + $input[1],
    '-' => $input[0] - $input[1],
    '*' => $input[0] * $input[1],
    '/' => $input[1] == 0 ? "Ошибка: деление на ноль!" : $input[0] / $input[1],
    default => "Ошибка: операция не поддерживается"
};

echo $result;
