<?php
//Задача:
//Переработай этот код, чтобы он соответствовал всем принципам SOLID.
//Требования:
//SRP: Раздели функциональность на классы с единственной ответственностью
//OCP: Сделай систему расширяемой, чтобы можно было добавить новый способ доставки или уведомления без изменения существующего кода.
//LSP: Убедись, что классы, реализующие общие интерфейсы , взаимозаменяемы без нарушения поведения.
//ISP: Раздели интерфейсы так, чтобы классы не реализовывали ненужные методы.
//DIP: Используй зависимости от абстракций, а не от конкретных реализаций.
interface OrderPriceCalculable
{
    public function calculateTotalPrice(array $items): float;
}
class OrderPriceCalculator implements OrderPriceCalculable {
    public function calculateTotalPrice(array $items) : float
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}
interface Exportable
{
    public function exportData($userEmail, $total): void;
}
class TXTExporter implements Exportable{

    public function exportData($userEmail, $total): void
    {
        file_put_contents('orders.txt', json_encode(['email' => $userEmail, 'total' => $total]) . PHP_EOL, FILE_APPEND);
    }
}
interface Emailable
{
    public function sendMail($userEmail, $total);
}
class SimpleEmailPost implements Emailable {

    public function sendMail($userEmail, $total)
    {
        //mail($userEmail, "Ваш заказ", "Заказ на сумму $total");
        // Для тестирования, пока что просто буду выводить
        return $userEmail." Ваш заказ на сумму $total";
    }
}
interface Deliverable
{
    public function delivery($total): string;
}
class CourierDelivery implements Deliverable{

    public function delivery($total): string
    {
        return "Доставка курьером: $total";
    }
}
class PostDelivery implements Deliverable{

    public function delivery($total): string
    {
        return "Доставка почтой: $total";
    }
}

class OrderManager {
    private OrderPriceCalculable $priceCalculator;
    private Deliverable $deliveryMethod;
    private Emailable $notifier;
    private Exportable $exportMethod;
    public function __construct($priceCalculator,$deliveryMethod, $notifier, $exportMethod)
    {
        $this->priceCalculator = $priceCalculator;
        $this->deliveryMethod = $deliveryMethod;
        $this->notifier = $notifier;
        $this->exportMethod = $exportMethod;
    }

    public function processOrder(array $items, string $userEmail): string {
        $total = $this->priceCalculator->calculateTotalPrice($items);
        $this->exportMethod->exportData($userEmail, $total);
        echo $this->notifier->sendMail($userEmail, $total);
        return $this->deliveryMethod->delivery($total);
    }
}

$items = [['price'=>10, 'quantity'=>10]];
$userEmail = "user@gmail.com";

//orderManager с Курьерской доставкой, Обычным емайлом и обычным экспортом в txt
$orderManager = new OrderManager(new OrderPriceCalculator(),new CourierDelivery(), new SimpleEmailPost(), new TXTExporter());

echo $orderManager->processOrder($items, $userEmail);