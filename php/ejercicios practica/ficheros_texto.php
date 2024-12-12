<?php

function crear(){
    $nombre_archivo = readline("Pon un nombre al archivo del archivo que deseas crear (pon al final del archivo un .txt): ");
    $archivo = file_put_contents("$nombre_archivo", "");
    if ($archivo !== false){
        echo "Se a creado corectamente el archivo con el nombre " . $nombre_archivo . "\n";
    } else{
    echo "Error al crear el archivo\n";
    }
}

function escribir(){
    $nombre_archivo = readline("Pon un nombre al archivo del archivo en el que deseas escribir: ");
    $contenido = readline("Pon el contenido que quieras escribir en el archivo: ");

    $archivo = file_put_contents($nombre_archivo, $contenido);
    if ($archivo !== false){
    echo "El texto se ha escrito con exito en el archivo " . $nombre_archivo . "\n";
    } else{
        echo "Error al escribir en el archivo \n";
    }
}

function leer(){
    $nombre_archivo = readline("Pon un nombre del archivo que deseas leer: ");
    $archivo = file_get_contents($nombre_archivo);
    if ($archivo !== false) {
        echo $archivo . "\n";
    } else {
        echo "Error al leer el archivo \n";
    }
}

function agregar(){
    $nombre_archivo = readline("Pon un nombre del archivo al que deseas añadir un texto: ");
    $contenido_nuevo = readline("Pon el contenido que deseas añadir al archivo: ");
    file_put_contents($nombre_archivo, $contenido_nuevo, FILE_APPEND);
    echo "El texto nuevo se a añadido bien en el archivo " . $nombre_archivo . "\n";

    echo "Contenido actualizado del archivo " . $nombre_archivo . "\n";
    echo file_get_contents($nombre_archivo);
}




$menu = readline("Menu: 1- Crear un archivo nuevo | 2- Escribir texto en el archivo | 3- Leer el contenido del archivo | 4- Añadir más texto al archivo");
switch($menu){
    case 1:
        crear();
        break;
    case 2:
        escribir();
        break;
    case 3:
        leer();
        break;
    case 4:
        agregar();
        break;
}



?>