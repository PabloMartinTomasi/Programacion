<?php
require_once 'funciones_articulos.php'; 
$archivo = "../datos/articulos.csv";
$id = $_POST["id"] ?? null;

if ($id !== null) {
    $articulos = leerArticulos($archivo);
    $articuloSelecionado = null;

    // Buscar el cliente por su ID
    foreach ($articulos as $index => $articulo) {
        if ($index > 0 && $articulo[0] == $id) {
            $articuloSelecionado = $articulo;
            break;
        }
    }

    if ($articuloSelecionado !== null):

    else:
        echo "<h1>Error: Articulo no encontrado</h1>";
    endif;
}
$nombre = $_POST["nombre"] ?? null;
$precio = $_POST["precio"] ?? null;
$stock = $_POST["stock"] ?? null;

if ($id !== null && $nombre !== null && $precio !== null && $stock !== null) {
    $articulos = leerArticulos($archivo);

    // Modificar el cliente correspondiente
    foreach ($articulos as $index => $articulo) {
        if ($index > 0 && $articulo[0] == $id) { // Saltar la cabecera
            $articulos[$index] = [$id, $nombre, $precio, $stock]; // Actualizar los datos
            break;
        }
    }

    // Guardar los datos actualizados en el archivo CSV
    escribirArticulos($archivo, $articulos);
    header("Location: ../index.php?opcion=articulos");
    exit();
}

?>