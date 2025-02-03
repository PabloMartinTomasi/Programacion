<?php
require_once '../controlador/EventosController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_evento = $_POST['id'];
    $controlador = new EventosController();
    $resultado = $controlador->eliminarEvento($id_evento);
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
    <title>Eliminar Evento</title>
</head>
<body>
<div class="container mt-4">
        <h1>Eliminar Evento</h1>
        <form action="eliminar_evento.php" method="POST">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="number" class="form-control" id="id" name="id" required>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
</body>
</html>