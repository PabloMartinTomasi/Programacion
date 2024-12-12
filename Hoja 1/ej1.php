<?php

$selecion = readline("Menu: \n1- Suma \n2- Resta \n3- Multiplicación \n4- División \n");

if($selecion == 1){
    $n1 = readline("Dame un primer número: ");
    $n2 = readline("Dame un segundo número: ");
    echo "La suma de " . $n1 . " y de " . $n2 . " es de: " . $n1+$n2;
}
    
elseif($selecion == 2){
    $n1 = readline("Dame un primer número: ");
    $n2 = readline("Dame un segundo número: ");
    echo "La resta de " . $n1 . " y de " . $n2 . " es de: " . $n1-$n2;
}

elseif($selecion == 3){
    $n1 = readline("Dame un primer número: ");
    $n2 = readline("Dame un segundo número: ");
    echo "La multiplicacion de " . $n1 . " y de " . $n2 . " es de: " . $n1*$n2;
}
elseif($selecion == 4){
    $n1 = readline("Dame un primer número: ");
    $n2 = readline("Dame un segundo número: ");
    echo "La division de " . $n1 . " y de " . $n2 . " es de: " . $n1/$n2;
}
    
else{
    echo "Seleciona una opcion del menu";
}

?>