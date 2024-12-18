<?php
require_once 'funciones_articulos.php';

$archivo = "../datos/articulos.csv";
$id = $_POST["id"] ?? null;

if ($id !== null) {
    $articulos = leerArticulos($archivo);
    $articulosActualizados = array_filter($articulos, function($articulo) use ($id) {
        return $articulo[0] != $id;
    });
    escribirArticulos($archivo, $articulosActualizados);
    echo "<h1>Artículo eliminado con éxito</h1>";
    header("Location: ../index.php?opcion=articulos");
    exit();
} else {
    echo "Error: No se recibió un ID válido.";
    header("Location: ../index.php?opcion=articulos");
    exit();
}
?>
