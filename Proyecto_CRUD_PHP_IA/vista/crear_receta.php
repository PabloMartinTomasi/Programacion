<?php
require_once '../controlador/RecetasController.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['titulo']) && isset($_GET['descripcion'])){
    $titulo = $_GET['titulo'];
    $descripcion = $_GET['descripcion'];

    $controller = new RecetasController();
    $resultado = $controller->CrearReceta($titulo, $descripcion);

    header("Location: ../index.php");
    exit();
} else{
    echo "Error al agregar la receta";
}
?>
