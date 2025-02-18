<?php
require_once '../controlador/RecetasController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_receta = $_POST['nombre_receta'];
    $ingredientes = $_POST['ingredientes'];
    $descripcion = $_POST['descripcion'];
    $tiempo = $_POST['tiempo'];
    $controlador = new RecetasController();
    $resultado = $controlador->CrearRecetas($nombre_receta, $ingredientes, $descripcion, $tiempo);
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Añadir receta</title>
</head>
<body>
    
</body>
</html>