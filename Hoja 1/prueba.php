<?php

/* Crea un programa que pida al usuario dos números y muestre el resultado de todas las operaciones aritméticas básicas entre ellos.

$numero1 = readline("Dame el primer número: ");
$numero2 = readline("Dame el segundo número: ");

echo "La suma de " . $numero1 . " y " . $numero2 . " es " . $numero1+$numero2 . "\n"; //Suma
echo "La resta de " . $numero1 . " y " . $numero2 . " es " . $numero1-$numero2 . "\n"; //Resta
echo "La multiplicacion de " . $numero1 . " y " . $numero2 . " es " . $numero1*$numero2 . "\n"; //Multiplicacion
echo "La division de " . $numero1 . " y " . $numero2 . " es " . $numero1/$numero2 . "\n"; //Division */


/* Escribe un programa que determine si un número es par o impar.

$n = readline("Dame un nuemor entero:");
if ($n % 2 == 0)
{
    echo "El número: " . $n . " es par";
} */
 

//Crea un programa que calcule el área de un círculo.

$pi = 3.14;
$radio = readline("Pon el radio del circulo");
echo "El area del circulo con un radio de " . $radio . " es de " . $pi*$radio**2;

?>