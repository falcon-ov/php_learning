<?php

namespace App;

class Worker{

    private string $name;
    private int $age;
    private array $hours;

    private string $position;

    private int $experience;

    public function __construct($name, $age, $hours, $position)
    {
        $this->name = $name;
        $this->age = $age;
        $this->hours = $hours;
        $this->position = $position;
    }

    public function work(){
        print_r("Im woriking!");
    }

    public function setPosition($value){
        $this->position = $value;
    }

    public function getPosition(){
        return $this->position;
    }
}