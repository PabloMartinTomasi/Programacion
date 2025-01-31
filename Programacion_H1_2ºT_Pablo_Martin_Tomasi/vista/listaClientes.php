<?php
require_once '../controlador/clientesController.php';
$controller = new ClientesController();
$clientes = $controller->listarClientes();//Funcion para poder ver a todos los clientes registrados


//Sirve para poder poner en la tabla lo que esta pagando cada cliente
$PrecioPlan = [
    'Basico' => 9.99,
    'Estandar' => 13.99,
    'Premium' => 17.99
];


$PrecioPack = [
    'Deporte' => 6.99,
    'Cine' => 7.99,
    'Infantil' => 4.99
];


function total($plan, $pack, $duracion, $pack_extra = null){
    global $PrecioPlan, $PrecioPack;


    $costoMensual = 0;


    if (isset($PrecioPlan[$plan])) {
        $costoMensual += $PrecioPlan[$plan];
    }


    if (isset($PrecioPack[$pack])) {
        $costoMensual += $PrecioPack[$pack];
    }


    if ($pack_extra && isset($PrecioPack[$pack_extra])) {
        $costoMensual += $PrecioPack[$pack_extra];
    }


    if ($duracion == 'Anual') {
        $costoMensual *= 12;
    }


    return $costoMensual;
}
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
    <script src="../js/scripts.js"></script>
    <title>Clientes Registrados</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"><!--Definimos la barra de navegacion-->
        <a class="navbar-brand" href="#">Stream Web</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Clientes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="listaClientes.php">Clientes registrados</a><!--Se podra ver los clientes registrados-->
                        <a class="dropdown-item" href="alta_cliente.php">Añadir cliente</a><!--Se podra añadir un nuevo cliente-->
                        <a class="dropdown-item" href="editar_cliente.php">Editar cliente</a><!--Podremos editar a un cliente-->
                    </div>
                </li>
            </ul>
        </div>
    </nav><br>
    <div class="container">
        <div class="centrar">
            <h1>Lista de los clientes</h1>
            <table class="table table-striped"><!--Hacemos la tabla para poder observar a todos los clientes registrados-->
                <thead class="table-secondary">
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
                        <?php //Nos sirver para poder ver lo que paga cada cliente
                            $plan = $cliente['plan'];
                            $pack = $cliente['pack'];
                            $duracion = $cliente['duracion'];
                            $pack_extra = isset($cliente['pack_extra']) ? $cliente['pack_extra'] : null;


                            $costoTotal = total($plan, $pack, $duracion, $pack_extra);
                        ?>
                        <tr>
                            <td><?= $cliente['id_cliente'] ?></td>
                            <td><?= $cliente['nombre'] ?></td>
                            <td><?= $cliente['apellido'] ?></td>
                            <td><?= $cliente['email'] ?></td>
                            <td><?= $cliente['edad'] ?></td>
                            <td><?= $cliente['plan'] ?></td>
                            <td>
                                <?= $cliente['pack'] ?>
                                <?php if ($pack_extra): ?>
                                    + <?= $pack_extra ?>
                                <?php endif; ?>
                            </td>
                            <td><?= $cliente['duracion'] ?></td>
                            <td><?=number_format($costoTotal, 2)?>€</td>
                            <td>
                                <a href="eliminar_cliente.php?id=<?= $cliente['id_cliente'] ?>" class="btn btn-danger active mb-3" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
