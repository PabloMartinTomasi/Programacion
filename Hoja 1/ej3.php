<?php

$numero = readline("Pon un número entero: ");

if ($numero <= 1) {
    echo "El número " . $numero . " no es primo\n";
} else {
$esPrimo = true;
for ($i = 2; $i <= $numero / 2; $i++) {
if ($numero % $i == 0) {
    $esPrimo = false;
    break;
}
}
if ($esPrimo) {
        echo "El número " . $numero . " es primo\n";
    } else {
        echo "El número " . $numero . " no es primo\n";
    }
}
?>