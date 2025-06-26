<?php

/*
Дан текст со словами. Перемешайте все слова этого текста в случайном порядке.
*/

function mixWords($input){
    $input = explode(' ',$input);
    shuffle($input);
    return implode(' ', $input);
}


$input =
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, quia error dicta quidem illo debitis soluta non atque nihil reprehenderit distinctio blanditiis in unde cupiditate reiciendis magni cumque vero dolorem neque velit? Debitis rem in earum adipisci, praesentium soluta illo dignissimos! Modi neque veritatis recusandae est fugiat alias! Iusto, architecto.";

echo mixWords($input).PHP_EOL;