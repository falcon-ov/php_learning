<?php 

namespace App;

class Developer extends Worker{

    use HasRest;
    public function work()
    {
        echo "Im developing";
    }
}