<?php
require_once '../controlador/clientesController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $controlador = new ClientesController();
    $resultado = $controlador->eliminarCliente($id_cliente);
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Eliminar Cliente</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Eliminar Cliente</h1>
        <form action="eliminar_cliente.php" method="POST">
            <div class="mb-3">
                <label for="id_cliente" class="form-label">ID</label>
                <input type="number" class="form-control" id="id_cliente" name="id_cliente" required>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
</body>
</html>