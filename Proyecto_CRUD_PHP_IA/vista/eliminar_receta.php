<?php
require_once '../controlador/RecetasController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_receta = $_POST['id_receta'];

    $controller = new RecetasController();
    $resultado = $controller->eliminarReceta($id_receta);

    header("Location: lista_recetas.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Eliminar receta</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Eliminar Receta</h1>
        <form action="eliminar_receta.php" method="POST">
            <div class="mb-3">
                <label for="id_receta" class="form-label">ID</label>
                <input type="number" class="form-control" name="id_receta" required>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
</body>
</html>