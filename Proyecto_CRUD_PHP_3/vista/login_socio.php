<?php
error_reporting(E_ERROR);
session_start();

if ($_POST['usario'] == 'admin' && $_POST['password'] == '1234'){
    $_SESSION['usuario'] = 'admin';
    header("Location: index.php");
} else{
    echo "Usuario o contraseña incorrectos.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Iniciar sesion</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Iniciar seseion</h1>
        <form action="alta_evento.php" method="POST">
        <div class="mb-3">
            Usuario: <input type="text" name="usuario"><br>
        </div>
        <div class="mb-3">
            Contraseña: <input type="password" name="password"><br>
        </div>
        </form>
    </div>
</body>
</html>








<form method="post">
    Usuario: <input type="text" name="usuario"><br>
    Contraseña: <input type="password" name="password"><br>
    <input type="submit" value="Iniciar Sesión">
</form>
