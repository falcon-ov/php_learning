<?php

//Задание 1:
//У вас есть класс Logger, который записывает логи только в файл.
//Сделайте его соответствующим принципу OCP,
//чтобы можно было добавлять новые способы логирования
//(например, в БД или консоль) без изменения класса Logger.
//Напишите код и покажите, как использовать новые классы.

interface LoggerMethod
{
    public function log(string $message) : void;
}
class ConsoleLogger implements LoggerMethod {

    public function log(string $message): void
    {
        echo $message.PHP_EOL;
    }
}

class FileLogger implements LoggerMethod {
    public function log($message): void
    {
        file_put_contents('log.txt', $message . PHP_EOL, FILE_APPEND);
    }
}

class Logger {
    private LoggerMethod $method;
    public function __construct($method)
    {
        $this->method = $method;
    }
    public function log($message) {
        $this->method->log($message);
    }
}

$message = "somesomesomemessage";
$fileLogger = new FileLogger();
$consoleLogger = new ConsoleLogger();

$logger1 = new Logger($fileLogger);
$logger1->log($message);
$logger2 = new Logger($consoleLogger);
$logger2->log($message);

