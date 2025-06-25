<?php

/*

Дан текст. Напишите программу,
которая отформатирует этот текст так,
чтобы в строке текста было не более 70 символов,
а потом шел перенос строки. Слова при этом не должны разбиваться. 

*/


function wrapTextByLength($input, $lenght)
{
    $lines = [];
    $unfinished = true;
    while ($unfinished) {
        $i = $lenght - 1;
        while (true) {
            if (!(strlen($input) < $i)) {
                if (!($input[$i] == ' ')) {
                    $i--;
                } else {
                    $lines[] = substr($input, 0, $i);
                    $input = substr($input, $i);
                    break;
                }
            } else {
                $lines[] = $input;
                $unfinished = false;
                break;
            }
        }
    }
    $output = implode(PHP_EOL, $lines);
    return $output;
}

$input =
    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, quia error dicta quidem illo debitis soluta non atque nihil reprehenderit distinctio blanditiis in unde cupiditate reiciendis magni cumque vero dolorem neque velit? Debitis rem in earum adipisci, praesentium soluta illo dignissimos! Modi neque veritatis recusandae est fugiat alias! Iusto, architecto.";


echo wrapTextByLength($input, 70);
