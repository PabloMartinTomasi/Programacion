<?php
require_once '../controlador/UsuariosController.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];
    $controlador = new UsuarioController();
    $resultado = $controlador->actualizar($id_usuario, $usuario, $contrasena, $rol);
    header('Location: lista_usuarios.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZwv-model-vue1T" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="css/estilo.css" rel="stylesheet">
    <title>Editar Socio</title>
</head>

<body>
    <div class="container mt-4">
        <h1>Añadir Usuario</h1>
        <form action="editar_usuarios.php" method="POST">
            <div class="mb-3">
                <label for="id_usuario" class="form-label">ID</label>
                <input type="number" class="form-control" id="id_usuario" name="id_usuario" required>
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contrasena</label>
                <input type="text" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <div class="form-floating">
                <select class="form-select" id="rol" name="rol" required>
                    <option selected>Rol</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>

</html>