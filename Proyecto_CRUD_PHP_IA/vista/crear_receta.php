<?php
require_once '../controlador/RecetasController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo']) && isset($_POST['descripcion'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $controller = new RecetasController();
    $resultado = $controller->CrearReceta($titulo, $descripcion);

    header("Location: ../index.php");
    exit();
}
?>
