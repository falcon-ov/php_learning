<?php
//Задача:
//Переработай этот код, чтобы он соответствовал всем принципам SOLID.
//Требования:
//SRP: Раздели функциональность на классы с единственной ответственностью
//OCP: Сделай систему расширяемой, чтобы можно было добавить новый способ доставки или уведомления без изменения существующего кода.
//LSP: Убедись, что классы, реализующие общие интерфейсы , взаимозаменяемы без нарушения поведения.
//ISP: Раздели интерфейсы так, чтобы классы не реализовывали ненужные методы.
//DIP: Используй зависимости от абстракций, а не от конкретных реализаций.

class OrderManager {
    public function processOrder($items, $userEmail, $deliveryType) {
        // Расчет стоимости (нарушение SRP)
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Сохранение заказа в файл (нарушение SRP, DIP)
        file_put_contents('orders.txt', json_encode(['email' => $userEmail, 'total' => $total]) . PHP_EOL, FILE_APPEND);

        // Отправка уведомления по email (нарушение SRP, DIP)
        mail($userEmail, "Ваш заказ", "Заказ на сумму $total");

        // Обработка доставки (нарушение OCP, LSP)
        if ($deliveryType === 'courier') {
            return "Доставка курьером: $total";
        } elseif ($deliveryType === 'post') {
            return "Доставка почтой: $total";
        }
    }
}