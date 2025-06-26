<?php

require_once('../vendor/autoload.php');

use App\Worker;
use App\Developer;

$worker = new Worker('Boris', 25, [1, 2, 3], 'fired');
$developer = new Developer('Ivan', 20, [1, 2, 3], 'dev');

$worker->work();
$developer->work();

echo $developer->getPosition();

echo PHP_EOL;