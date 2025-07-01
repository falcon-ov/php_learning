<?php

/*
Напишите функцию, которая определяет, слово является палиндромом.
 */

function isPalindrome($word) : bool
{
    if((strlen($word) % 2)){
        $firstHalf = substr($word, 0, ((strlen($word)-1)/2));
        $secondHalf = substr($word, (((strlen($word)-1)/2)+1), strlen($word)-1);
        if($firstHalf == strrev($secondHalf)){
            return true;
        }
        else{
            return false;
        }
    } else{
        $firstHalf = substr($word, 0, (strlen($word)/2));
        $secondHalf = substr($word, (strlen($word)/2), strlen($word)-1);
        if($firstHalf == strrev($secondHalf)){
            return true;
        }
        else{
            return false;
        }
    }
}

var_dump(isPalindrome("paffvp"));