<?php

//Заполняем массив n случайными значениями
$n = 10;
$array = [];
for($i = 0; $i < $n; $i++) {
    $array[$i] = rand(1, 20);
}

print("Массив до обработки");
print("<pre>".print_r($array, true)."</pre>");

$a = 100; // Элемент для insert'а
$i = 0;
while($i < count($array))
{
    if(preg_match('/2/', $array[$i]))
    {
        // Делаем циклический сдвиг с конца вправо и вставляем элемент
        for($j = count($array)-1; $j >= $i; --$j)
        {
            $array[$j+1] = $array[$j];
        }
        $array[$i+1] = $a;
        $i++;
    }
    $i++;
}

print("Массив после обработки");
print("<pre>".print_r($array, true)."</pre>");
