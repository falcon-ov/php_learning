<?php

//Задание 1:
//
//Создай PHP-скрипт, который обрабатывает запросы методом DELETE.
//Если запрос является DELETE, выведи сообщение: "Ресурс удалён успешно.".
//Для всех других методов верни код ответа 405 и сообщение: "Метод не разрешён.".
//Проверь работу скрипта с помощью cURL или Postman.
$method = $_SERVER['REQUEST_METHOD'];

if($method == 'DELETE'){
    echo "Ресурс удален успешно.".PHP_EOL;
} else{
    http_response_code(405);
    echo "Метод \"$method\" не разрешен".PHP_EOL;
}
//curl -X DELETE -d "" http://localhost:8000/http_methods_1.php