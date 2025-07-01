<?php

/*

Спроектируйте базу данных для хранения информации о книгах и их авторов. Напишите запрос для выборки всех авторов и количества написанных ими книг.

*/

$pdo = new PDO('sqlite:database.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$pdo->exec('
//CREATE TABLE IF NOT EXISTS authors(
//    id INTEGER PRIMARY KEY AUTOINCREMENT,
//    full_name VARCHAR(100) NOT NULL
//);
//');
//$stmt = $pdo->prepare('INSERT INTO authors (full_name) VALUES (:full_name)');
//
//for($i = 1; $i <= 10; $i++){
//    $stmt->execute([
//        'full_name' => "author_full_name_".$i
//    ]);
//}
//
//$pdo->exec('
//CREATE TABLE IF NOT EXISTS books(
//    id INTEGER PRIMARY KEY AUTOINCREMENT,
//    title VARCHAR(100) NOT NULL,
//    author_id INT,
//    FOREIGN KEY (author_id) REFERENCES authors(id)
//);
//');
//
//$stmt = $pdo->prepare('INSERT INTO books (title, author_id) VALUES (:title,:author_id)');
//
//for($i = 1; $i <= 10; $i++){
//    $stmt->execute([
//        'title' => 'book'.$i,
//        'author_id' => rand(1, 10)
//    ]);
//}

$result = $pdo->query('SELECT * FROM authors;');

foreach ($result as $item) {
    $itemId = $item['id'];
    $amountBooks = ($pdo->query("SELECT COUNT(*) FROM books WHERE author_id = {$itemId}")->fetchAll(PDO::FETCH_ASSOC));
//    print_r($amountBooks);
    echo $item['full_name'].": ".$amountBooks[0]['COUNT(*)'].PHP_EOL;
}