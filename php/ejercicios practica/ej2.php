<?php

$archivo = fopen("datos.txt", "r");

if($archivo){
    $palabra = readline("Pon la palabra que deseas buscar: ");
    $contador = 0;
    while (($linea = fgets($archivo)) !== false) {

        $contador += substr_count(strtolower($linea), strtolower($palabra));
    }
    fclose($archivo);
}
echo "La palabra". $palabra . "en el archivo (datos.txt) aparece un total de " . $contador . " veces";

?>