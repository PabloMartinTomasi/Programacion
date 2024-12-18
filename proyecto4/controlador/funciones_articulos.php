<?php
function leerArticulos($archivo) {
    $articulos = [];
    if (($handle = fopen($archivo, "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $articulos[] = $data;
        }
        fclose($handle);
    }
    return $articulos;
}

function escribirArticulos($archivo, $articulos) {
    if (($handle = fopen($archivo, "w")) !== false) {
        foreach ($articulos as $articulo) {
            fputcsv($handle, $articulo);
        }
        fclose($handle);
    }
}
?>