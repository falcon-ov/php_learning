<?php
//Задание 1: Чтение файла целиком
//Напишите PHP-скрипт, который использует функцию file_get_contents() для чтения
// всего содержимого файла data.txt и выводит его в браузер.
// Если файл не удалось открыть, выведите сообщение об ошибке.
// Предположите, что файл data.txt содержит произвольный текст.
//
//Подсказка:
//
//Используйте file_get_contents($filename) для чтения файла.
//Проверьте, существует ли файл, с помощью file_exists($filename) перед чтением.

$filename = 'data.txt';
if(file_exists($filename)){
    $oneString = file_get_contents($filename);
    if($oneString){
        echo nl2br(htmlspecialchars($oneString));
    }else{
        echo "Не удалось открыть файл";
    }
} else{
    echo "не удалось найти файл";
}