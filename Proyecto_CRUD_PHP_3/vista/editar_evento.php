<?php
require_once '../controlador/EventosController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_evento = $_POST['id_socio'];
    $nombre_evento = $_POST['nombre_evento'];
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $controlador = new EventosController();
    $resultado = $controlador->actualizarEvento($id_evento, $nombre_evento, $fecha, $lugar);
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Editar Evento</title>
</head>
<body>
<div class="container mt-4">
        <h1>Editar Evento</h1>
        <form action="editar_evento.php" method="POST">
            <div class="mb-3">
                <label for="id_evento" class="form-label">ID</label>
                <input type="number" class="form-control" id="id_evento" name="id_evento" required>
            </div>
            <div class="mb-3">
                <label for="nombre_evento" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="mb-3">
                <label for="lugar" class="form-label">Lugar</label>
                <input type="text" class="form-control" id="lugar" name="lugar" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>