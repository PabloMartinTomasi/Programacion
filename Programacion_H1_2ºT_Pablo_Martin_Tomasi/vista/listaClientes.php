<?php
require_once '../controlador/clientesController.php';
$controller = new ClientesController();
$clientes = $controller->listarClientes();
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
    <link href="css/estilo.css" rel="stylesheet">
    <title>Clientes Registrados</title>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Clientes
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="alta_cliente.php">Añadir Cliente</a></li>
                            <li><a class="dropdown-item" href="eliminar_cliente.php">Eliminar Cliente</a></li>
                            <li><a class="dropdown-item" href="editar_cliente.php">Editar Cliente</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1>Lista de los clientes</h1>
    <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edad</th>
                    <th scope="col">ID Factura</th>
                    <th scope="col">Plan</th>
                    <th scope="col">Pack</th>
                    <th scope="col">Duracion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?= $cliente['id_cliente'] ?></td>
                        <td><?= $cliente['nombre'] ?></td>
                        <td><?= $cliente['apellido'] ?></td>
                        <td><?= $cliente['email'] ?></td>
                        <td><?= $cliente['edad'] ?></td>
                        <td><?= $cliente['id_factura'] ?></td>
                        <td><?= $cliente['plan'] ?></td>
                        <td><?= $cliente['pack'] ?></td>
                        <td><?= $cliente['duracion'] ?></td>
                        <td>
                            <a href="editar_cliente.php?id=<?= $cliente['id_cliente'] ?>" class="btn btn-primary active mb-3" role="button">Editar</a>
                            <a href="eliminar_cliente.php?id=<?= $cliente['id_cliente'] ?>" class="btn btn-danger active mb-3" role="button">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
    <br>
    <a href="alta_cliente.php" class="btn btn-primary active mb-3" role="button">Agregar un nuevo cliente</a>
</body>
</html>
