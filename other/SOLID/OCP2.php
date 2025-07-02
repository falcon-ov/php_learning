<?php

//Задание 2:
//У вас есть класс ShapeAreaCalculator, который вычисляет площадь только для круга.
//Сделайте его соответствующим OCP, чтобы можно было добавлять новые фигуры (например, прямоугольник) без изменения класса.
//Напишите код и покажите, как использовать новые классы.

interface AreaCalculator
{
    public function calculateArea($params);
}
class CircleAreaCalculator implements AreaCalculator {
    public function calculateArea($params) {
            return pi() * $params['radius'] * $params['radius'];
    }
}
class SquareAreaCalculator implements AreaCalculator {
    public function calculateArea($params) {
        return pow($params['length'],2);
    }
}
class ShapeAreaCalculator {
    private AreaCalculator $method;
    public function __construct($method)
    {
        $this->method = $method;
    }
    public function calculateArea($params) {
        return $this->method->calculateArea($params);
    }
}
$squareParams = ['length' => 10];
$circleParams = ['radius' => 5];

$squareAreaCalculator = new SquareAreaCalculator();
$circleAreaCalculator = new CircleAreaCalculator();

$squareCalculator = new ShapeAreaCalculator(new SquareAreaCalculator());
echo $squareCalculator->calculateArea($squareParams) . PHP_EOL;

$circleCalculator = new ShapeAreaCalculator(new CircleAreaCalculator());
echo $circleCalculator->calculateArea($circleParams) . PHP_EOL;