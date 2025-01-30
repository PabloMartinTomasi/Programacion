<?php
require_once '../controlador/clientesController.php';//Decimos que es necesario el archivo ClientesController de la carpeta controlador

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Recoje los datos que se han enviado a traves del formulario para eliminar al cliente
    $id_cliente = $_POST['id_cliente'];
    $controlador = new ClientesController();//Creamos una nueva instancia del archivo ClientesController.php
    $resultado = $controlador->eliminarCliente($id_cliente);//functio para poder eliminar el cliente corectamente solo ingresando el id
    header('Location: ../index.php');//Despues de que el cliente haya sido agregado con exito nos mandara al archivo index.php
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
        <h1>Eliminar Cliente</h1><!--Formulario para eliminar a un cliente-->
        <form action="eliminar_cliente.php" method="POST">
            <div class="mb-3">
                <label for="id_cliente" class="form-label">ID</label><!--El cliente debe introducir su id-->
                <input type="number" class="form-control" id="id_cliente" name="id_cliente" required>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar</button><!--Bonton para poder eliminar al cliente-->
        </form>
    </div>
</body>
</html>
