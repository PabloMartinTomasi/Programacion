<?php
error_reporting(E_ALL);

$nombre = ["Andrés", "Valentina", "Lucas", "Mariana", "Luis", "Sofía", "Carlos", "Camila", "Javier", "Natalia"];
$apellido = ["García", "Rodríguez", "López", "Pérez", "Martínez", "González", "Sánchez", "Romero", "Díaz", "Torres"];

$nom = rand(0, count($nombre) - 1);//nombre
$ape = rand(0, count($apellido) - 1);//apellido
$Nombre_Completo = $nombre[$nom] . " " . $apellido[$ape];
echo "Tu nombre es: " . $Nombre_Completo . "\n";

?>