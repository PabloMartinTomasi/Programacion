<?php

$archivo = fopen("datos.txt", "r");

if($archivo){
    $contador = 0;
    while (($linea = fgets($archivo)) !== false) {
        $contador = $contador + 1;
    }
    fclose($archivo);
}
echo "El total de lineas en el archivo (datos.txt) es de " . $contador . " lineas";

?>