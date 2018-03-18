<?php
// 1. Дан массив с элементами 1, 2, 3, 4, 5. С помощью цикла foreach найдите сумму квадратов элементов этого массива.
$array = [1, 2, 3, 4, 5];
function squaresSum($arr) {
    foreach ($arr as &$val) {
        $val = pow($val, 2);
    }
    echo $result = array_sum($arr);
}
//squaresSum($array);

// 2. Сформировать массив от 1 до 100 цикл while с числами от 0 до 100 или for()


$integers = [];
for($i=0; $i <= 100; $i++) {
    $integers[] = rand(0,100);
}
//echo "<pre>";
//print_r($integers);
//echo "<pre>";


// 3. С помощью foreach() Определить для каждого значение десятичный логарифм. log10() и ограничить количество знаков после запятой number_format

function logarifmForArray($arr) {
    foreach($arr as &$val) {
        $val = number_format(log10($val), 3);
    }

    return $arr;

    //echo "<pre>";
    //print_r($arr);
    //echo "<pre>";
}
logarifmForArray($integers);

// 4. Результат запишите в файл с уникальным названием.

$file = 'logarifm.txt';
$text = implode(logarifmForArray($integers), ', ');
file_put_contents($file, $text, FILE_APPEND | LOCK_EX);


?>