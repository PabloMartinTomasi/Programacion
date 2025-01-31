<?php
require_once '../controlador/ClientesController.php';//Decimos que es necesario el archivo ClientesController de la carpeta controlador


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Recoje los datos que se han enviado a traves del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $plan = $_POST['plan'];
    $pack = $_POST['pack'];
    $packadicional = $_POST['pack_adicional'];
    $duracion = $_POST['duracion'];
    $id_cliente= $_POST['id_cliente'];
    $controlador = new ClientesController();//Creamos una nueva instancia del archivo ClientesController.php
    if ($packadicional == 'vacio') {
        $resultado = $controlador->agregarCliente($nombre, $apellido, $email, $edad, $plan, $pack, $duracion, $id_cliente);//Llamamos a la funcion de agregar cliente que esta en el archivo de class clientes
    }
    else{
        $packTotal = $pack . "," . $packadicional;
        $resultado = $controlador->agregarCliente($nombre, $apellido, $email, $edad, $plan, $packTotal, $duracion, $id_cliente);//Llamamos a la funcion de agregar cliente que esta en el archivo de class clientes
    }


    header('Location: ../index.php');//Despues de que el cliente haya sido agregado con exito nos mandara al archivo index.php
    exit();//Nos aseguramos que el script termine despues de la redirecion
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Añadir Cliente</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Añadir Cliente</h1><!--Formulario para añadir al cliente-->
        <form action="alta_cliente.php" method="POST"><!--El formulario pone los datos que hemos puesto aqui a alta_cliente.php-->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label><!--El cliente ingresa su nombre-->
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label><!--El cliente ingresa su apellido-->
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label><!--El cliente ingresa su coreo electronico-->
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label><!--El clienre ingresa la edad-->
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="form-floating">
                <select class="form-select" id="plan" name="plan" required><!--El cliente escoje el tipo de plan que mas le gusta-->
                    <option value="" disabled selected>Tipo de plan</option>
                    <option value="Basico">Basico</option>
                    <option value="Estandar">Estandar</option>
                    <option value="Premium">Premium</option>
                </select>
            </div>
            <br>
            <div class="form-floating">
                <select class="form-select" id="pack" name="pack" required><!--El cliente elige el tipo de pack que quiere-->
                    <option value="" disabled selected>Tipo de pack</option>
                    <option value="Deporte">Deporte</option>
                    <option value="Cine">Cine</option>
                    <option value="Infantil">Infantil</option>
                </select>
            </div>
            <div class="form-floating" id="pack_extra_container" style="display: none;">
                <select class="form-select" id="pack_adicional" name="pack_adicional">
                    <option value="vacio" disabled selected>Selecciona un pack adicional</option>
                    <option value="Deporte">Deporte</option>
                    <option value="Cine">Cine</option>
                    <option value="Infantil">Infantil</option>
                </select>
            </div>
            <br>
            <div class="form-floating">
                <select class="form-select" id="duracion" name="duracion" required><!--El cliente pone durante cuánto quiere pagar, por mes o al año-->
                    <option selected>Duración de la suscripción</option>
                    <option value="Mensual">Mensual</option>
                    <option value="Anual">Anual</option>
                </select>
            </div>
            <div>
                <p id="total">Costo Total: 0 €</p><!--Muestra el precio total que va a pagar el cliente-->
            </div>
            <button type="submit" class="btn btn-primary">Añadir nuevo cliente</button><!--Bonton para poder añadir al nuevo cliente-->
        </form>
    </div>
    <script src="../js/scripts.js"></script><!--Llamamo al scripts.js para tener el Java Script y que pueda efectuar corectamente las restrinciones-->


</body>
</html>





