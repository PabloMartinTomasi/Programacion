<?php
function generarTabla($archivoCSV, $tipo) {
    $tabla = "<a href='vistas/formulario_" . $tipo . ".html' class='btn btn-primary mb-3'>Añadir Nuevo " . ucfirst($tipo) . "</a>
    <a href='vistas/formulario_eliminar_" . $tipo . ".html' class='btn btn-danger mb-3'>Eliminar " . ucfirst($tipo) . "</a>
    <a href='vistas/formulario_modificar_" . $tipo . ".html' class='btn btn-success mb-3'>Modificar " . ucfirst($tipo) . "</a>";
    $tabla .= "<table class='table table-striped'>";

    if (($archivo = fopen($archivoCSV, "r")) !== false) {
        $cabeceras = fgetcsv($archivo);
        $tabla .= "<thead><tr>";
        foreach ($cabeceras as $cabecera) {
            $tabla .= "<th>" . htmlspecialchars($cabecera) . "</th>";
        }
        $tabla .= "</tr></thead><tbody>";
        while (($fila = fgetcsv($archivo)) !== false) {
            $tabla .= "<tr>";
            foreach ($fila as $celda) {
                $tabla .= "<td>" . htmlspecialchars($celda) . "</td>";
            }
            $tabla .= "</tr>";
        }
        fclose($archivo);
    }
    $tabla .= "</tbody></table>";
    return $tabla;
}
?>