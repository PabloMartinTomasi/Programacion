<?php
require_once '../controlador/usuario_controller.php'; //Nos sirve para tener que evitar de volver a escribir lo mismo

if ($_SERVER['REQUEST_METHOD'] === 'POST'){//Usamos el metodo post para poder crear la cuenta a el usuario
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $controlador = new IniciarSesionController();
    $resultado = $controlador-> registrar_usuario($email, $nombre, $contrasena);
    header('Location: ../vista/login.php');//Le decimos que nos mande al login cuando un usuario se haya registrado con exito
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
    <title>Crear cuenta</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Crear cuenta</h1>
        <form action="alta_usuario.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label><!-- El usuario tendra que introducir su email que sera su nombre de usuario -->
                <input type="email" class="form-control" id="email" name="email" required><br>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label><!-- Solicitamos al usuario que ponga su nombre -->
                <input type="text" class="form-control" id="nombre" name="nombre" required><br>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label><!-- El usuario va a tener que introducir su contraseña -->
                <input type="password" class="form-control" id="contrasena" name="contrasena" required><br>
            </div>
            <div class="mb-3">
                <label><input type="checkbox" id="terminos" name="terminos" value="terminos">Aceptar normas y condiciones</label><!-- El usuario tendra que hacer clic en acpetar las normas y condiciones para poder registrarse -->
            </div>
            <div class="mb-3">
                <input type="submit" value="Crear cuenta" class="btn btn-primary" id="btn-registrar" disabled><!-- Sirve para que el cliente pueda registrarse -->
            </div>
        </form>
    </div>

    <script src="../script/script.js"></script><!-- Es el js, para que si el cliente no haga clic en las normas y condiciones, no se pueda registrar -->
</body>
</html>