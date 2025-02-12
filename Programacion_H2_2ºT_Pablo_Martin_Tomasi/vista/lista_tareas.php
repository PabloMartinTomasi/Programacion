<?php
require_once '../controlador/tareas_controller.php';
session_start();
if (!isset($_SESSION['email'])){
    header('Location: ../login.php');//Redirigir al usuario si no esta logueado
    exit();
}
$email = $_SESSION['email'];
$controller = new TareasController();
$tareas = $controller->obtener_tareas($email);
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
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">Gestor de las tareas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tareas
                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="lista_tareas.php">Lista de las tareas</a>
                        <a class="dropdown-item" href="alta_tarea.php">Añadir tarea</a>
                    </div>
                </li>
            </ul>
            <div class="ms-auto">
                <?php
                    echo "<p>Bienvenido {$email}</p>";
                ?>
            </div>
            <div class="ms-auto">
                <form class="form-inline my-2 my-lg-0">
                    <a href="login.php" class="btn btn-danger active mb-3" role="button">Cerrar sesión</a>
                </form>
            </div>
        </div>
    </nav>
    <h1>Listado de las tareas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID de la tarea</th>
                <th>Nombre de la tarea</th>
                <th>Descripcion de la tarea</th>
                <th>Estado de la tarea</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>
                <tr>
                    <td><?= $tarea['id_tarea']?></td>
                    <td><?= $tarea['nombre_tarea']?></td>
                    <td><?= $tarea['descripcion_tarea']?></td>
                    <td><?= $tarea['estado_tarea']?></td>
                    <td><a href="eliminar_tarea.php" class="btn btn-danger active mb-3" role="button">Eliminar tarea</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>