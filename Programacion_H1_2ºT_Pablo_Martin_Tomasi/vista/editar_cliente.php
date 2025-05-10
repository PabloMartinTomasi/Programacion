<?php
require_once '../controlador/ClientesController.php';

$cliente = null;

if (isset($_GET['id_cliente'])) {
    // Si estamos editando, obtenemos los datos del cliente
    $id_cliente = $_GET['id_cliente'];
    $controlador = new ClientesController();
    $cliente = $controlador->buscarClientePorId($id_cliente);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recogemos los datos enviados por el formulario
    $id_cliente = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $id_factura = $_POST['id_factura'];
    $plan = $_POST['plan'];
    $pack = $_POST['pack'];
    $packadicional = $_POST['pack_adicional'];
    $duracion = $_POST['duracion'];

    $controlador = new ClientesController(); // Instanciamos el controlador de clientes

    // Si no hay pack adicional, actualizamos el cliente solo con el pack seleccionado
    if (empty($packadicional) || $packadicional == 'vacio') {
        $resultado = $controlador->actualizarCliente($id_cliente, $nombre, $apellido, $email, $edad, $id_factura, $plan, $pack, $duracion);
    } else {
        // Si hay pack adicional, lo concatenamos con el pack principal
        $packTotal = $pack . "," . $packadicional;
        $resultado = $controlador->actualizarCliente($id_cliente, $nombre, $apellido, $email, $edad, $id_factura, $plan, $packTotal, $duracion);
    }

    header('Location: ../index.php'); // Redirigimos después de actualizar
    exit(); // Terminamos el script
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Editar cliente</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Editar cliente</h1>

        <form action="editar_cliente.php" method="POST">
            <?php if ($cliente): ?>
                <!-- Si es una edición, pasamos el ID del cliente -->
                <input type="hidden" name="id_cliente" value="<?php echo $cliente['id_cliente']; ?>">
            <?php else: ?>
                <div class="mb-3">
                    <label for="id_cliente" class="form-label">Id cliente</label>
                    <input type="number" class="form-control" id="id_cliente" name="id_cliente" required>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $cliente ? $cliente['nombre'] : ''; ?>" required>
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

            <div class="mb-3">
                <label for="id_factura" class="form-label">ID factura</label>
                <input type="number" class="form-control" id="id_factura" name="id_factura" required>
            </div>

            <div class="form-floating">
                <select class="form-select" id="plan" name="plan" required>
                    <option value="" disabled selected>Tipo de plan</option>
                    <option value="Basico">Plan Básico (1 dispositivo)</option>
                    <option value="Estandar">Plan Estándar (2 dispositivos)</option>
                    <option value="Premium">PremiPlan Premium (4 dispositivos)</option>
                </select>
            </div>
            <br>

            <div class="form-floating">
                <select class="form-select" id="pack" name="pack" required>
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
                <select class="form-select" id="duracion" name="duracion" required>
                    <option value="Mensual">Mensual</option>
                    <option value="Anual">Anual</option>
                </select>
            </div>
            <div>
                <p id="total">Costo Total: 0 €</p><!--Muestra el precio total que va a pagar el cliente-->
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
    <script src="../js/scripts.js"></script>

    <script>
        document.getElementById('pack').addEventListener('change', function () {
            const packAdicionalContainer = document.getElementById('pack_extra_container');
            if (this.value === 'Deporte' || this.value === 'Cine' || this.value === 'Infantil') {
                packAdicionalContainer.style.display = 'block';
            } else {
                packAdicionalContainer.style.display = 'none';
            }
        });
    </script>
</body>
</html>
