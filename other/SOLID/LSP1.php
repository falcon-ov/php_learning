<?php
//Задание 1:
//У вас есть интерфейс Vehicle с методом startEngine.
//Класс Car реализует его корректно, но класс Bicycle не может, так как у велосипеда нет двигателя.
//Переработайте код, чтобы он соответствовал LSP. Напишите код и покажите, как использовать новые классы.

interface Vehicle {
    public function driverTookControl();
}

interface HasEngine extends Vehicle
{
    public function startEngine(): string;
};

class Car implements HasEngine {
    public function startEngine(): string {
        return "Двигатель машины запущен";
    }

    public function driverTookControl()
    {
        return "Водитель сел за руль";
    }
}

class Bicycle implements Vehicle {
    public function driverTookControl()
    {
        return "Велосепедист сел на велик";
    }
}

$bicycle = new Bicycle();
$car = new Car();

echo $bicycle->driverTookControl().PHP_EOL;
echo $car->driverTookControl().PHP_EOL;
echo $car->startEngine().PHP_EOL;