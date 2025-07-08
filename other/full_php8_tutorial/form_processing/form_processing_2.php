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
$error = [];

if($method == 'POST'){
    $product_name = '';
    $price = '';

    $product_name = $_POST['product_name'] ?? '';
    $price = $_POST['price'] ?? '';
    $category = $_POST['category'] ?? '';

    if(!(filter_var($price, FILTER_VALIDATE_FLOAT)) || !($price > 0)) {
        $error[] = "Цена должна быть положительным числом";
    }
    if((empty($product_name) || empty($price))){
        $error[] = "Заполните все поля!";
    }
    if(empty($error)) {
        $data['product_name'] = $product_name;
        $data['price'] = $price;
        $data['category'] = $category;
        $dataJson = json_encode($data, JSON_PRETTY_PRINT);
        echo $dataJson;
    }
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
            <ul>
                <?php
                foreach ($error as $item):
                echo "<li>".$item."</li>";
                endforeach;
                ?>
            </ul>

            <label for="product_name">Product name: </label>
            <input type="text" name="product_name" value="<?= $product_name ?>">
            <br><br>
            <label for="price">Price: </label>
            <input type="text" name="price" value="<?= $price ?>">
            <br><br>
            <select name="category">
                <option value="electronics" <?php echo ( $category == 'electronics') ? 'selected' : '' ?> >Электроника</option>
                <option value="clothing" <?php echo ( $category == 'clothing') ? 'selected' : '' ?>>Одежда</option>
                <option value="books" <?php echo ( $category == 'books') ? 'selected' : '' ?>>Книги</option>
            </select>
            <br><br>
            <button type="submit">Send</button>
            <br><br>
        </form>
    </div>
</body>
</html>
