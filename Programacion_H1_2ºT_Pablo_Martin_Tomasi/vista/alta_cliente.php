<?php
require_once '../controlador/ClientesController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $plan = $_POST['plan'];
    $pack = $_POST['pack'];
    $duracion = $_POST['duracion'];
    $id_cliente= $_POST['id_cliente'];
    $controlador = new ClientesController();
    $resultado = $controlador->agregarCliente($nombre, $apellido, $email, $edad, $plan, $pack, $duracion, $id_cliente);
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
    <title>Añadir Cliente</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Añadir Cliente</h1>
        <form action="alta_cliente.php" method="POST">
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
                <input type="email" class="form-control" id="email" name="email" required>
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
                <select class="form-select" id="pack" name="pack"required>
                    <option selected>Tipo de pack</option>
                    <option value="Deporte">Deporte</option>
                    <option value="Cine">Cine</option>
                    <option value="Infantil">Infantil</option>
                </select>
            </div>
            <br>
            <div class="form-floating">
                <select class="form-select" id="duracion" name="duracion"required>
                    <option selected>Duracion de la suscripcion</option>
                    <option value="Mensual">Mensual</option>
                    <option value="Anual">Anual</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Añadir nuevo cliente</button>
        </form>
    </div>
</body>
</html>