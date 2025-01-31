<?php
require_once '../controlador/clientesController.php';//Decimos que es necesario el archivo ClientesController de la carpeta controlador


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Recoje los datos que se han enviado a traves del formulario para actualizar al cliente
    $id_cliente = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];
    $id_factura = $_POST['id_factura'];
    $plan = $_POST['plan'];
    $pack = $_POST['pack'];
    $packadicional = $_POST['pack_adicional'];
    $duracion = $_POST['duracion'];
    $controlador = new ClientesController();//Creamos una nueva instancia del archivo ClientesController.php
    $controlador->actualizarCliente($id_cliente, $nombre, $apellido, $email, $edad, $id_factura, $plan, $pack, $duracion);
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
    <script src="../js/scripts.js"></script><!--Llamamo al scripts.js para tener el Java Script y que pueda efectuar corectamente las restrinciones-->
    <title>Editar Cliente</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Cliente</h1><!--Formulario para editar los datos de un cliente-->
        <form action="editar_cliente.php" method="POST">
        <div class="mb-3">
                <label for="id_cliente" class="form-label">ID</label>
                <input type="number" class="form-control" id="id_cliente" name="id_cliente" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="form-floating">
                <select class="form-select" id="plan" name="plan"required>
                    <option selected>Tipo de plan</option>
                    <option value="Basico">Basico</option>
                    <option value="Estandar">Estandar</option>
                    <option value="Premium">Premium</option>
                </select>
            </div>
            <br>
            <div class="form-floating">
                <select class="form-select" id="pack" name="pack" required>
                    <option selected>Tipo de pack</option>
                    <option value="Deporte">Deporte</option>
                    <option value="Cine">Cine</option>
                    <option value="Infantil">Infantil</option>
                </select>
            </div>
            <br>
            <div class="form-floating">
                <select class="form-select" id="duracion" name="duracion" required>
                    <option selected>Duracion de la suscripcion</option>
                    <option value="Mensual">Mensual</option>
                    <option value="Anual">Anual</option>
                </select>
            </div>
            <div>
                <p id="total">Costo Total: 0 €</p>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button><!--Bonton para poder guardar los datos actualizados del cliente cliente-->
        </form>
    </div>
</body>
</html>





