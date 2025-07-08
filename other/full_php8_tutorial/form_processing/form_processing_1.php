<?php

//Задание 1:
//Создай PHP-скрипт с формой, которая принимает имя пользователя
//(username) и адрес электронной почты (email) через метод POST.
//Проверь, что оба поля заполнены и что email имеет корректный формат 
//(используй filter_var() с FILTER_VALIDATE_EMAIL). 
//Если данные корректны, выведи сообщение: "Данные сохранены: [username], [email]".
//Если есть ошибки, выведи их (например, "Email некорректен" или "Заполните все поля").
//Экранируй данные с помощью htmlspecialchars() для безопасного вывода. 
//Сохраняй введённые данные в форме при ошибке. Проверь работу с помощью браузера.

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = '';
    $email = '';
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $error = [];
    $data = [];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL) && $email !== ''){
        $error[] = 'Email некорректен';
    }
    if($username == '' || $email == ''){
        $error[] = "Заполните все поля";
    }
    if(empty($error)){
        $data[] = $username;
        $data[] = $email;
    }
}else{
    echo 'МЕТОД НЕДОСТУПЕН';
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
<div style="text-align: center;">
    <?php if(!empty($data)):
        $outputUsername = htmlspecialchars($username);
        $outputEmail = htmlspecialchars($email);
        echo "Данные сохранены: [$outputUsername], [$outputEmail]";
    endif; ?>
    <?php if(!empty($error)):
        foreach ($error as $message):
            echo $message."<br>";
        endforeach;
    endif; ?>
    <form method="POST" action="">
        <label for="username">Username: </label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
        <br><br>
        <label for="email">Email: </label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <br><br>
        <button type="submit">Отправить</button>
    </form>
</div>

</body>
</html>
