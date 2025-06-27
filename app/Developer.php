<?php 

namespace App;

class Developer extends Worker{

    use HasRest;
    public function work()
    {
        echo "Im developing".PHP_EOL;
    }

    public function __toString(): string
    {
        return "this is a developer class".PHP_EOL;
    }

    public function __call(string $name, array $arguments)
    {
        print "unexisted method was ran".PHP_EOL;
    }

    public function __get(string $name)
    {
        echo "asdasd";
    }
}