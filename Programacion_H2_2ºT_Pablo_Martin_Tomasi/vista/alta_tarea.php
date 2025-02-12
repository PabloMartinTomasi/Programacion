<?php
require_once '../controlador/tareas_controller.php'; //Nos sirve para tener que evitar de volver a escribir lo mismo
session_start();
if (!isset($_SESSION['email'])) {
    throw new Exception("Error: No hay un usuario autenticado.");
}
$email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre_tarea = $_POST['nombre_tarea'];
    $descripcion_tarea = $_POST['descripcion_tarea'];
    $estado_tarea = $_POST['estado_tarea'];
    $$email = $_POST['email'];
    $controlador = new TareasController();
    $resultado = $controlador->crear_tarea($nombre_tarea, $descripcion_tarea, $estado_tarea, $email);
    header('Location: ../vista/lista_tareas.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo/#.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZwv-model-vue1T" crossorigin="anonymous"/><meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="../css/estilo.css" rel="stylesheet">
    <title>Crear tarea</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Crear tarea</h1>
        <form action="alta_tarea.php" method="post">
            <div class="mb-3">
                <label for="nombre_tarea" class="form-label">nombre_tarea:</label>
                <input type="text" class="form-control" id="nombre_tarea" name="nombre_tarea" required><br>
            </div>
            <div class="mb-3">
                <label for="descripcion_tarea" class="form-label">descripcion_tarea:</label>
                <input type="text" class="form-control" id="descripcion_tarea" name="descripcion_tarea" required><br>
            </div>
            <div class="form-floating">
                <select class="form-select" id="estado_tarea" name="estado_tarea" require>
                    <option value="" disabled selected>Estado de la tarea</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Completada">Completada</option>
                    <option value="Pausada">Pausada</option>
                </select>
            </div><br>
            <div class="mb-3">
                <input type="submit" value="Crear tarea" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>