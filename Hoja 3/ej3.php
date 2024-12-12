<?php
function manejadorDeErrores($errno, $errstr) {
    echo "Error: $errstr\n";
}

set_error_handler("manejadorDeErrores");

function buscarElemento($array, $valor) {
    $posicion = array_search($valor, $array);

    if ($posicion === false) {
        trigger_error("El elemento no se encuentra en el array.", E_USER_ERROR);
    }
    return $posicion;
}

$array = ["manzana", "naranja", "pera"];
$fruta = readline("Pon el elemeneto del array que deseas buscar: ");

echo buscarElemento($array, $fruta);

?>