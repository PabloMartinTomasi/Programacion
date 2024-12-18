<?php
require_once 'funciones_proveedores.php';

$archivo = "../datos/proveedores.csv";
$id = $_POST["id"] ?? null;

if ($id !== null) {
    $proveedores = leerProveedor($archivo);
    $proveedoresActualizados = array_filter($proveedores, function($proveedor) use ($id) {
        return $proveedor[0] != $id;
    });
    escribirProveedores($archivo, $proveedoresActualizados);
    echo "<h1>Proveedor eliminado con éxito</h1>";
    header("Location: ../index.php?opcion=proveedores");
    exit();
} else {
    echo "Error: No se recibió un ID válido.";
    header("Location: ../index.php?opcion=proveedores");
    exit();
}
?>