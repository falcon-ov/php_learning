<?php
$filename = 'input.txt'; //просто путь к файлу, как переменная
$file = file_get_contents($filename); //получаю весь файл в виде одной строки
$words = explode(PHP_EOL, $file); //разделяю строку на слова, PHP_EOL(это как \n)
$result = []; //массив в котором будет результат

for($i = 0; $i < count($words); $i++){ //этот for проходит по всем словам в массиве
    $result[$i][] = $words[$i]; //помещаю в результат слово, которое буду сравнивать с другими
    for($j = $i+1; $j < count($words); $j++){ // прохожу по всем словам после данного ($i +1_
        $jItem = str_split($words[$j]); // разделяю изначальное слово на массив из буквы
        $iItem = str_split($words[$i]);
        sort($jItem);
        sort($iItem);
        if($iItem == $jItem){
            $result[$i][] = implode($jItem);
            unset($words[$j]);
            $words = array_values($words);
            $j--;
        }
    }
}

foreach ($result as $line){
    foreach ($line as $word){
        echo $word." ";
    }
    echo PHP_EOL;
}