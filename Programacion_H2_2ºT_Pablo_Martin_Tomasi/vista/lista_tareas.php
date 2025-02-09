<?php
require_once '../controlador/tareas_controller.php';
session_start();
if (!isset($_SESSION['usuario'])){
    header("Location: logout.php");//Redirigir al usuario si no esta logueado
    exit();
}
$controller = new TareasController();
$tareas = $controller->obtener_tareas();
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
    <title>Listado de las tareas</title>
</head>
<body>
    <h1>samiop</h1>
    <a href="crear_tarea.php" class="btn btn-danger active mb-3" role="button">Cerrar sesióna</a>
    <a href="logout.php" class="btn btn-danger active mb-3" role="button">Cerrar sesión</a>


    <h1>Listado de tareas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre_tarea</th>
                <th>descripcion_tarea</th>
                <th>estado_tarea</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>
                <tr>
                    <td><?= $tarea['id_usuario']?></td>
                    <td><?= $tarea['nombre_tarea']?></td>
                    <td><?= $tarea['descripcion_tarea']?></td>
                    <td><?= $tarea['estado_tarea']?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="crear_tarea.php" class="btn btn-danger active mb-3" role="button">Cerrar sesión</a>
</body>
</html>