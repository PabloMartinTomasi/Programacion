<?php
error_reporting(E_ALL);

$contraseña = readline("Introduce una contraseña que tenga como minimo 8 caracteres una mayuscula, una minusculu y un número: ");

$caracteres = strlen($contraseña);

while (true){
    if ($contraseña < 8){
        echo "La contraseña debe de tener como minimo 8 caracteres \n";
        $contraseña = readline("Introduce una contraseña que tenga como minimo 8 caracteres una mayuscula, una minusculu y un número: ");
        continue;
    } elseif (!preg_match("/[A-Z]/", $contraseña)){
        echo "La contraseña debe contener el minimo de una mayuscula \n";
        $contraseña = readline("Introduce una contraseña que tenga como minimo 8 caracteres una mayuscula, una minusculu y un número: ");
        continue;
    } elseif(!preg_match("/[a-z]/", $contraseña)){
        echo "La contraseña debe de contener el minimo de una minuscula \n";
        $contraseña = readline("Introduce una contraseña que tenga como minimo 8 caracteres una mayuscula, una minusculu y un número: ");
        continue;
    } elseif(!preg_match("/\d/", $contraseña)){
        echo "La contraseña debe de contener el minimo de un número \n";
        $contraseña = readline("Introduce una contraseña que tenga como minimo 8 caracteres una mayuscula, una minusculu y un número: ");
        continue;
    }
    echo "La contraseña que has introducido es corecta";
    break;
}

?>