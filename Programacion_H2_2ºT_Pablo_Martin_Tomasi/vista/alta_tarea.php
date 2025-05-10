<?php
require_once '../controlador/tareas_controller.php'; //Nos sirve para tener que evitar de volver a escribir lo mismo
session_start();//Nos sirve para mantener la sesión iniciada
if (!isset($_SESSION['email'])) {
    throw new Exception("Error: No hay un usuario autenticado.");
}
$email = $_SESSION['email'];//Nos sirve para no tener que introducir el email del usuario a la hora de crear una nueva tarea

if ($_SERVER['REQUEST_METHOD'] === 'POST'){//Es el metodo post, para poder poner el nombre, la descripcion y el estado de la tarea que se desea crear
    $nombre_tarea = $_POST['nombre_tarea'];
    $descripcion_tarea = $_POST['descripcion_tarea'];
    $estado_tarea = $_POST['estado_tarea'];
    $$email = $_POST['email'];
    $controlador = new TareasController();
    $resultado = $controlador->crear_tarea($nombre_tarea, $descripcion_tarea, $estado_tarea, $email);
    header('Location: ../vista/lista_tareas.php');//Decimos que nos mande al listado de las tareas
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
    <nav class="navbar navbar-expand-lg"><!-- Es la barra de navegacion para poder añadir una nueva tarea o ver el listado de las tareas -->
        <a class="navbar-brand" href="#">Gestor de tareas</a>
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
                        <a class="dropdown-item" href="lista_tareas.php">Lista de las tareas</a><!-- Nos sirve para poder observar la lista de las tareas que no se hayan eliminado -->
                        <a class="dropdown-item" href="alta_tarea.php">Añadir tarea</a><!-- Nos sirve para poder añadir una tarea -->
                    </div>
                </li>
            </ul>
            <div class="ms-auto">
                <?php
                echo "<p>Bienvenido {$_SESSION['user']}</p>";//Nos sirve para que ponga "Bienvenido" y luego el nombre del usuario
                ?>
            </div>
            <div class="ms-auto">
                <form class="form-inline my-2 my-lg-0">
                    <a href="login.php" class="btn btn-danger active mb-3" role="button">Cerrar sesión</a><!-- Nos sirve para poder cerrar la sesión -->
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1>Crear tarea</h1>
        <form action="alta_tarea.php" method="post">
            <div class="mb-3">
                <label for="nombre_tarea" class="form-label">Nombre de la tarea:</label><!-- Tenemos que introducir el nombre de la tarea -->
                <input type="text" class="form-control" id="nombre_tarea" name="nombre_tarea" required><br>
            </div>
            <div class="mb-3">
                <label for="descripcion_tarea" class="form-label">Descripcion de la tarea:</label><!-- Ponemos la descripcion de la tarea -->
                <input type="text" class="form-control" id="descripcion_tarea" name="descripcion_tarea" required><br>
            </div>
            <div class="form-floating">
                <select class="form-select" id="estado_tarea" name="estado_tarea" require><!-- Tenemos que poner el estado de la tarea -->
                    <option value="" disabled selected>Estado de la tarea</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Completada">Completada</option>
                    <option value="Pausada">Pausada</option>
                </select>
            </div><br>
            <div class="mb-3">
                <input type="submit" value="Crear tarea" class="btn btn-primary"><!-- Creamos la tarea -->
            </div>
        </form>
    </div>
</body>
</html>