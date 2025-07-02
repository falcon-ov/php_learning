<?php

//Задание 1:
//У вас есть интерфейс Printer с методами print, scan и fax.
//Класс SimplePrinter печатает, но не сканирует и не отправляет факсы.
//Переработайте код, чтобы он соответствовал ISP.
//Напишите код и покажите, как использовать новые классы.

interface Printer {
    public function print(): string;
}
interface Scanner
{
    public function scan(): string;
}
interface Fax
{
    public function fax(): string;
}

class SimplePrinter implements Printer {
    public function print(): string
    {
        return "Печатаю документ";
    }
}
class SimpleScanner implements Scanner
{

    public function scan(): string
    {
        return "Сканирую документы";
    }
}
class SimpleFax implements Fax{
    public function fax(): string{
        return "Печатаю факс";
    }
}

class AdvancedPrinter implements Printer, Scanner{

    public function print(): string
    {
        return "Печатаю документ";
    }

    public function scan(): string
    {
        return "Сканирую документы";
    }
}

$simpleFax = new SimpleFax();
$simplePrinter = new SimplePrinter();
$simpleScanner = new SimpleScanner();
$advancedPrinter = new AdvancedPrinter();

echo $simpleFax->fax().PHP_EOL;
echo $simplePrinter->print().PHP_EOL;
echo $simpleScanner->scan().PHP_EOL;
echo $advancedPrinter->scan().PHP_EOL;
echo $advancedPrinter->scan().PHP_EOL;