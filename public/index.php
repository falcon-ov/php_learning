<?php

require_once('../vendor/autoload.php');

use App\Worker;
use App\Developer;
use App\Salary;

$developer = new Developer('Ivan', 20, [1, 2, 3], 'dev');

print($developer);

$developer->asdasd();
$developer->asdasd;

echo PHP_EOL;