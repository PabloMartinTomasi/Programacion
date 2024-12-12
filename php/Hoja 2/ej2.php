<?php
error_reporting(E_ALL);

$array = [];

for ($i = 0; $i <= 20; $i++) {
    $array[] = rand(1, 200);
}

$t = count($array);

for ($i = 0; $i < $t - 1; $i++) {
    for ($j = 0; $j < $t - 1 - $i; $j++) {
        if ($array[$j] > $array[$j + 1]) {
            $temp = $array[$j];
            $array[$j] = $array[$j + 1];
            $array[$j + 1] = $temp;
        }
    }
}

echo "El array ordenado es este: ";
print_r($array)

?>