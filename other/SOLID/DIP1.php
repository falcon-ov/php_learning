<?php
//Задание 1:
//У вас есть класс PaymentProcessor, который зависит от конкретного класса StripeGateway для обработки платежей.
//Переработайте код, чтобы он соответствовал DIP, введя интерфейс и поддержку других шлюзов (например, PayPal).
//Напишите код и покажите, как использовать новые классы.

interface PaymentGateway
{
    public function processPayment(float $amount): string;
}
class StripeGateway implements PaymentGateway {
    public function processPayment($amount): string {
        return "Оплата $amount через Stripe";
    }
}

class PayPalGateway implements PaymentGateway {
    public function processPayment($amount): string {
        return "Оплата $amount через PayPal";
    }
}

class PaymentProcessor {
    private PaymentGateway $gateway;

    public function __construct(PaymentGateway $gateway) {
        $this->gateway = $gateway;
    }

    public function process($amount): string {
        return $this->gateway->processPayment($amount);
    }
}

$payPalPaymentProcessor = new PaymentProcessor(new PayPalGateway());
$stripPaymentProcessor = new PaymentProcessor(new StripeGateway());

echo $payPalPaymentProcessor->process(100).PHP_EOL;
echo $stripPaymentProcessor->process(200).PHP_EOL;