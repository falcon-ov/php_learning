<?php

//Задание 2:
//
//Напиши PHP-скрипт, который создаёт массив с информацией о книге
//(название, автор, год издания).
//Преобразуй массив в JSON-строку с использованием JSON_PRETTY_PRINT.
//Затем декодируй эту JSON-строку обратно в PHP-массив и выведи значение поля "автор".
//Если произошла ошибка при декодировании,
//выведи сообщение об ошибке с помощью json_last_error_msg().

$bookInfo = [
    'title' => "1984",
    'data_published' => 1948,
    'author' => "George Orwell"
];

$encoded = json_encode($bookInfo, JSON_PRETTY_PRINT);
$decoded = json_decode($encoded, true);
if(json_last_error_msg() != "No error"){
    echo json_last_error_msg();
}
echo 'author: '.$decoded['author'].PHP_EOL;