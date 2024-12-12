<?php
error_reporting(E_ALL);

function dividir($n2) {
    if ($n2 == 0) {
        throw new Exception("No se puede dividir entre cero");
        return $n1 / $n2;
    }
}


function calculadora($n1, $n2){
    $operador = readline("Pon un operador entre: \n1- Suma \n2- Resta \n3- Multiplicar \n4- Division");
    switch($operador){
        case 1:
            echo "La suma de " . $n1 . " y de " . $n2 . " es un total de " . $n1 + $n2;
            return $n1 + $n2;
        case 2:
            echo "La resta de" . $n1 . " y de " . $n2 . " es un total de " . $n1-$n2;
            return $n1 - $n2;
        case 3:
            echo "La multiplicacion de " . $n1 . " y de " . $n2 . " es un total de " . $n1*$n2;
            return $n1 * $n2;
        case 4:
            try {
                $resultado = dividir($n1, $n2);
                echo "La division de " . $n1 . " y de " . $n2 . " es un total de " . $resultado . "\n";
                return $resultado;
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage() . "\n";
            }
    }
}

$n1 = readline("Introduce un numero: ");
$n2 = readline("Introduce un numero: ");

calculadora($n1, $n2);


?>