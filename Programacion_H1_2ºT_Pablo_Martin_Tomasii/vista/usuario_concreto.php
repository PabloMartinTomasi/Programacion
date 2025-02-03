<?php
require_once '../controlador/clientesController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_cliente'])) {
    $id_cliente = $_POST['id_cliente'];
    $controlador = new ClientesController();
    $resultado = $controlador->obtenerClientesPorId($id_cliente);
    header("Location: usuarioConcreto.php?id_cliente=" . $id_cliente);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Ver Cliente por ID</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Cliente</h1>
        <form action="usuario_concreto.php" method="POST">
        <div class="mb-3">
                <label for="id_cliente" class="form-label">ID</label>
                <input type="number" class="form-control" id="id_cliente" name="id_cliente" required>
            </div>
            <button type="submit" class="btn btn-primary">Mirar</button>
        </form>
    </div>
</body>
</html>