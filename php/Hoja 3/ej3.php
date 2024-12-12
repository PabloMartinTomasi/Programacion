<?php


function buscarElemento($array){
    $array = ["manzana", "naranja", "pera"];
    return $array;
}

$fruta = readline("Pon un nombre del array: ");
echo buscarElemento($array, $fruta);


?>