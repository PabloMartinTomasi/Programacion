<?php
require_once '../controlador/InicioSesionController.php';
session_start();

if (isset($_POST['usuario']) && !empty($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    $esAdmin = ($usuario == 'admin');

    if ($esAdmin) {
        $contrasena = '';
    } elseif (isset($_POST['contrasena']) && !empty($_POST['contrasena'])) {
        $contrasena = $_POST['contrasena'];
    } else {
        $_SESSION['error'] = "Has ingresado mal la contraseña o el usuario";
        header("Location: login_socios.php");
        exit();
    }
    $controlador = new InicioSesionController();
    $resultado = $controlador->iniciarSesion($usuario, $contrasena, $esAdmin);

    if (is_array($resultado) && isset($resultado['exito'])) {
        if ($resultado['exito']) {
            $_SESSION[$esAdmin ? 'Admin' : 'User'] = $resultado['usuario'];
            session_regenerate_id(true);
            header("Location: lista_socios.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="css/estilo.css" rel="stylesheet">
    <title>Iniciar sesión</title>
</head>

<body>
    <div class="container mt-4">
        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
            unset($_SESSION['error']);
        }
        ?>
        <h1>Iniciar sesión</h1>
        <form method="POST" action="" autocomplete="off">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required><br>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" value=""
                <?php
                if (isset($_POST['usuario']) && $_POST['usuario'] == 'Admin') {
                    echo 'disabled';
                }
                ?>
                ><br>
            </div>
            <div class="mb-3">
                <input type="submit" value="Iniciar Sesión" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>
