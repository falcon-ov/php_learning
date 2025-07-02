<?php

//Задание 1:
//У вас есть класс OrderProcessor, который обрабатывает заказы в интернет-магазине.
//Он одновременно вычисляет стоимость заказа и сохраняет его в базу данных.
//Разделите этот класс на два, чтобы он соответствовал принципу SRP.
//Напишите код и покажите, как использовать новые классы.

class OrderProcessor {
    public function processOrder($items, $userId) {
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        // Сохранение заказа в БД (имитация)
        file_put_contents('orders.txt', json_encode(['userId' => $userId, 'total' => $total]) . PHP_EOL, FILE_APPEND);
        return $total;
    }
}

class OrderCalculation{
    public function priceCalculate($items)
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}
class OrderRepository{
    public function createOrder($userId, $total)
    {
        file_put_contents('orders.txt', json_encode(['userId' => $userId, 'total' => $total]) . PHP_EOL, FILE_APPEND);
    }
}

$items = [[
   'price' => 10,
   'quantity' => 10
]];
$userId = 14;

$orderCalc = new OrderCalculation();
$orderRep = new OrderRepository();

$orderRep->createOrder($userId, $orderCalc->priceCalculate($items));