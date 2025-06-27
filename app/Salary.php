<?php

namespace App;

class Salary
{
    static function count(array $hours)
    {
        return array_sum($hours) * 2000;
    }
}