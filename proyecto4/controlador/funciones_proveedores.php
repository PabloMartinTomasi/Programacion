<?php
function leerProveedor($archivo) {
    $proveedores = [];
    if (($handle = fopen($archivo, "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $proveedores[] = $data;
        }
        fclose($handle);
    }
    return $proveedores;
}

function escribirProveedores($archivo, $proveedores) {
    if (($handle = fopen($archivo, "w")) !== false) {
        foreach ($proveedores as $proveedor) {
            fputcsv($handle, $proveedor);
        }
        fclose($handle);
    }
}
?>
