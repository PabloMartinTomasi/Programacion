<?php

function tablaMultiplicar($n){
    if (!is_int($n) || $n <= 0) {
        throw new Exception("El número debe ser uno positivo.");
    }for ($i = 1; $i <= 10; $i++) {
        echo "$n x $i = " . ($n * $i) . "\n";
    }
}

try {
    $numero = (int)readline("Pon un numero entero: ");
    tablaMultiplicar($numero);
}catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>