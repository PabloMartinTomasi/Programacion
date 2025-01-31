<?php
require_once '../controlador/clientesController.php';
if (isset($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];
    $controlador = new ClientesController();
    $resultado = $controlador->obtenerClientesPorId($id_cliente);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="../js/script.js" defer></script>
    <title>Ver Cliente por ID</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Stream Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="listaClientes.php" role="button" aria-haspopup="true" aria-expanded="false" href="?opcion=clientes">
                            Clientes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php if (isset($resultado)): ?>
        <?php if (is_array($resultado) && count($resultado) > 0): ?>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Edad</th>
                        <th>ID Factura</th>
                        <th>Plan</th>
                        <th>Pack</th>
                        <th>Duracion</th>
                        <th>Gasto total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $usuario): ?>
                        <tr>
                            <td><?= $usuario['id_cliente'] ?></td>
                            <td><?= $usuario['nombre'] ?></td>
                            <td><?= $usuario['apellido'] ?></td>
                            <td><?= $usuario['email'] ?></td>
                            <td><?= $usuario['edad'] ?></td>
                            <td><?= $usuario['id_factura'] ?></td>
                            <td><?= $usuario['plan'] ?></td>
                            <td><?= $usuario['pack'] ?></td>
                            <td><?= $usuario['duracion'] ?></td>
                            <td>
                                <div>
                                    <p id="costo-total">Costo Total: 0 €</p>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados para el ID proporcionado.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Error: No se obtuvo ningún resultado del servidor.</p>
    <?php endif; ?>
</body>
</html>