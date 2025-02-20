<?php
require_once '../controlador/RecetasController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['id_receta'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $id_receta = $_POST['id_receta'];

    $controller = new RecetasController();
    $resultado = $controller->editarReceta($titulo, $descripcion, $id_receta);

    header("Location: lista_recetas.php");
    exit();
}

$controllerr = new RecetasController();
$recetas = $controllerr->obtenerRecetas();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Editar receta</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Editar receta</h1>
            <div class="col-md-6 mb-3">
                <?php foreach ($recetas as $receta): ?>
                    <form action="editar_receta.php" method="post">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="id_receta" class="form-label">ID de la receta:</label>
                                    <input type="number" class="form-control" name="id_receta" value="<?= ($receta['id_receta']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Titulo de la receta:</label>
                                    <input type="text" class="form-control" name="titulo" value="<?= htmlspecialchars($receta['titulo']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripcion de la receta:</label>
                                    <input type="text" class="form-control" name="descripcion" value="<?= nl2br(htmlspecialchars($receta['descripcion'])) ?>">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Editar receta</button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>