<?php


//Задание 2:
//Напиши PHP-скрипт с формой, которая принимает данные о продукте:
//название (product_name), цену (price) и категорию
//(category, выбор из выпадающего списка: "Электроника", "Одежда", "Книги").
//Используй метод POST. Проверь, что:
//Название не пустое.
//Цена — положительное число (используй filter_var() с FILTER_VALIDATE_FLOAT).
//Категория выбрана из предложенных вариантов.
//Если данные корректны, выведи JSON-объект с этими данными (используй json_encode()).
//Если есть ошибки, выведи их в списке (<ul>).
//Экранируй строковые данные и сохраняй введённые значения в форме.
//Проверь работу в браузере.

$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST'){
    $_POST[''];
} else{
    echo "Ошибка: необходим метод POST ".PHP_EOL;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="text-align: center">
        <form method="post" action="">


            <label for="product_name">Product name: </label>
            <input type="text" name="product_name">
            <br><br>
            <label for="price">Price: </label>
            <input type="text" name="price">
            <br><br>
            <select name="category">
                <option value="electronics">Электроника</option>
                <option value="clothing">Одежда</option>
                <option value="books">Книги</option>
            </select>
            <br><br>
            <button type="submit">Send</button>
            <br><br>
        </form>
    </div>
</body>
</html>
