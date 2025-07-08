<?php

//Задание 2:
//
//Напиши PHP-скрипт, который обрабатывает POST-запросы.
//Если в POST-запросе передан параметр username,
//выведи приветственное сообщение: "Привет, [username]!".
//Если параметр username отсутствует,
//верни код ответа 400 и сообщение: "Ошибка: параметр username обязателен.".
//Для всех других методов верни код ответа 405 и сообщение: "Только POST-запросы разрешены.".

$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST"){
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        echo "Привет, $username!".PHP_EOL;
    }else{
        http_response_code(400);
        echo "Ошибка: параметр username обязателен".PHP_EOL;
    }
} else{
    http_response_code(405);
    echo "Только POST-запросы разрешены".PHP_EOL;
}


//curl -X POST -d "username=Daniil" http://localhost:8000/http_methods_2.php