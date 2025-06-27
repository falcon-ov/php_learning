<?php

require_once('../vendor/autoload.php');

use App\Worker;
use App\Developer;
use App\Salary;

$developer = new Developer('Ivan', 20, [1, 2, 3], 'dev');

$salary = Salary::count($developer->getHours());
echo $salary;

echo PHP_EOL;