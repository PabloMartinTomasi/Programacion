<?php   
require_once '../controlador/InicioSesionController.php';
error_reporting(E_ERROR);
session_start();

if (isset($_SESSION['User']) || isset($_SESSION['Admin'])) {
    header("Location: ../vista/lista_socios.php");
    exit();
}

$esAdmin = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena =  $_POST['contrasena'];
    $esAdmin = ($usuario == 'Admin');
    if ($esAdmin && empty($contrasena)){
        $contrasena = null;
    }

    $controlador = new InicioSesionController();
    $resultado = $controlador->iniciarSesion($usuario, $contrasena, $esAdmin);

    if ($resultado['exito']) {
        if ($esAdmin) {
            $_SESSION['Admin'] = $resultado['usuario'];
        } else {
            $_SESSION['User'] = $resultado['usuario'];
        }
        header("Location: ../vista/lista_socios.php");
        exit();
    } else {
        $_SESSION['error'] = $resultado['error'];
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
        <form method="POST" action="">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required><br>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" <?php echo $esAdmin ? '' : 'required'; ?>><br>
            </div>
            <div class="mb-3">
                <input type="submit" value="Iniciar Sesión" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>
