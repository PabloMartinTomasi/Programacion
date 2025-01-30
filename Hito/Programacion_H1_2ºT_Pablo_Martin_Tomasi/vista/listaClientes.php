<?php
require_once '../controlador/clientesController.php';//Decimos que es necesario el archivo ClientesController de la carpeta controlador
$controller = new ClientesController();//Creamos una nueva instancia del archivo ClientesController.php
$clientes = $controller->listarClientes();//Despues de que el cliente haya sido agregado con exito nos mandara al archivo index.php
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
    <title>Clientes Registrados</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"><!--Definimos la barra de navegacion-->
        <a class="navbar-brand" href="#">Stream Web</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav"> 
                <li class="nav-item dropdown"> <!--Usamos el drpdpwn para que cuando en la barra de navegacion se haga clic en clientes se pueda selecionar clientes registrados, añadir cliente, editar cliente-->
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Clientes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="listaClientes.php">Cliente registrados</a><!--Se podra ver los clientes registrados-->
                        <a class="dropdown-item" href="alta_cliente.php">Añadir cliente</a><!--Se podra añadir un nuevo cliente-->
                        <a class="dropdown-item" href="editar_cliente.php">Editar cliente</a><!--Podremos editar a un cliente-->
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="centrar">
            <h1>Lista de los clientes</h1>
            <table class="table"><!--Hacemos la tabla para poder observar a todos los clientes registrados-->
                <thead class="table-dark"><!--La cabecera de la tabla sera aqui de un fondo oscuro-->
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Plan</th>
                        <th scope="col">Pack</th>
                        <th scope="col">Duracion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody> <!--Aqui se van a rellenar todos los datos de los clientes-->
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?= $cliente['id_cliente'] ?></td><!--Tendremos el id del cliente-->
                            <td><?= $cliente['nombre'] ?></td><!--Tendremos el nombre del cliente-->
                            <td><?= $cliente['apellido'] ?></td><!--Tendremos el apellido del cliente-->
                            <td><?= $cliente['email'] ?></td><!--Tendremos el coreo electronico del cliente-->
                            <td><?= $cliente['edad'] ?></td><!--Tendremos la edad del cliente-->
                            <td><?= $cliente['plan'] ?></td><!--Tendremos el plan que escoje el cliente-->
                            <td><?= $cliente['pack'] ?></td><!--Tendremos el pack que escoje eñ cliente-->
                            <td><?= $cliente['duracion'] ?></td><!--Tendremos el tiempo que paga el cliente-->
                            <td>€</td><!--Tendremos cuanto paga el cliente-->
                            <td>
                                <a href="eliminar_cliente.php?id=<?= $cliente['id_cliente'] ?>" class="btn btn-danger active mb-3" role="button">Eliminar</a><!--Añadimos un boton para poder eliminar a un cliente-->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
