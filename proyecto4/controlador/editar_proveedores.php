<?php
require_once 'funciones_proveedores.php'; 
$archivo = "../datos/proveedores.csv";
$id = $_POST["id"] ?? null;

if ($id !== null) {
    $proveedores = leerProveedor($archivo);
    $proveedorSeleccionado = null;

    // Buscar el cliente por su ID
    foreach ($proveedores as $index => $proveedor) {
        if ($index > 0 && $proveedor[0] == $id) {
            $proveedorSeleccionado = $proveedor;
            break;
        }
    }

    if ($proveedorSeleccionado !== null):

    else:
        echo "<h1>Error: Proveedor no encontrado</h1>";
    endif;
}
$nombre = $_POST["nombre"] ?? null;
$telefono = $_POST["telefono"] ?? null;
$email = $_POST["email"] ?? null;
$direccion = $_POST["direccion"] ?? null;

if ($id !== null && $nombre !== null && $telefono !== null && $email !== null && $direccion !== null) {
    $proveedores = leerProveedor($archivo);

    // Modificar el cliente correspondiente
    foreach ($proveedores as $index => $proveedor) {
        if ($index > 0 && $proveedor[0] == $id) { // Saltar la cabecera
            $proveedores[$index] = [$id, $nombre, $telefono, $email, $direccion]; // Actualizar los datos
            break;
        }
    }

    // Guardar los datos actualizados en el archivo CSV
    escribirProveedores($archivo, $proveedores);
    header("Location: ../index.php?opcion=proveedores");
    exit();
}

?>