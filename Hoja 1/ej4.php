<?php

$n = rand(1, 100);
$numero = readline("Ingresa un numero del 1 al 100, para adivinar el
nuemero secreto: ");

while($n !== (int)$numero){
if($n > $numero){
echo "El numero que has puesto no es el correcto. Intenta con

uno mas grande: ";
} elseif($n < $numero){
echo "El numero que has puesto no es el correcto. Intenta con

uno mas pequeño: ";
} else{
echo "Pon un numero que este en el rango del 1 al 100";
}


$numero = readline("");
}
echo "¡Has adivinado el número secreto! El número era " . $n . "\n";
?>