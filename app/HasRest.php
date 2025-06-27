<?php

namespace App;

trait HasRest
{
    public function rest(){
        print($this->getName() . 'has rest');
    }
}