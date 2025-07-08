<?php

//Задание 1:
//
//Создай PHP-скрипт, который принимает JSON-строку через POST-запрос
//(например, {"username": "Alex", "email": "alex@example.com"}).
//Декодируй JSON в массив и выведи значения username и email.
//Если JSON некорректен или отсутствует,
//верни код ответа 400 и сообщение: "Ошибка: некорректный JSON или данные отсутствуют."
//Проверь работу скрипта с помощью cURL или Postman.

//curl -i POST http:/localhost:8000/json_processing_1.php \
//     -H "Content-Type: application/json" \
//     -d '..."username":"D.aniil","email":"daniil@g.mail.com"..}.'

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
    $json = file_get_contents("php://input");
    if($json){
        $decoded = json_decode($json, true);
        if(is_array($decoded) && isset($decoded['username'], $decoded['email'])){
            echo "username:".$decoded['username'].PHP_EOL;
            echo "email:".$decoded['email'].PHP_EOL;
        }else{
            http_response_code(400);
            echo "Ошибка: некорректный JSON или данные отсутствуют.".PHP_EOL;
        }
    }else{
        http_response_code(400);
        echo "Ошибка: некорректный JSON или данные отсутствуют.".PHP_EOL;
    }
} else{
    http_response_code(405);
    echo "Только POST метод доступен".PHP_EOL;
}