<?php
session_start();//Nos sirve para poder iniciar sesión
require_once '../controlador/usuario_controller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {//Metodo post para poder iniciar sesion
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $controlador = new IniciarSesionController();
    $resultado = $controlador->iniciar_sesion($email, $contrasena);

    if (is_string($resultado)) {
        $_SESSION['error'] = $resultado;
        echo "<div class='p-3 mb-2 bg-danger'>La contraseña o el email estan incorectos</div>";
    } else {
        $_SESSION['email'] = $resultado['email'];
        $_SESSION['user'] = $resultado['nombre'];
        header("Location: lista_tareas.php");//Cuando se haya iniciado sesión nos madara al listado de las tareas
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
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
    <title>Login</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Iniciar sesión</h1>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label><!-- El usuario tendra que poner su email para iniciar sesion -->
                <input type="email" class="form-control" id="email" name="email" required><br>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label><!-- El usuario tendra que poner su contraseña para poder iniciar sesión -->
                <input type="password" class="form-control" id="contrasena" name="contrasena" required><br>
            </div>
            <div class="mb-3">
                <input type="submit" value="Iniciar Sesión" class="btn btn-primary"><!-- Boton para poder iniciar sesion -->
            </div>
            <div class="mb-3">
                <a href="alta_usuario.php" class="btn btn-primary active mb-3" role="button">Registrarse</a><!-- Boton para poder registrarse -->
            </div>
        </form>
    </div>
</body>
</html>