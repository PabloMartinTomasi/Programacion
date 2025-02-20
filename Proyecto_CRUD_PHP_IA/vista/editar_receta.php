<?php
require_once '../controlador/RecetasController.php';

$controller = new RecetasController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['titulo']) && !empty($_POST['descripcion']) && isset($_POST['id_receta'])){
    $titulo = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $id_receta = $_POST['id_receta'];

    $resultado = $controller->editarReceta($titulo, $descripcion, $id_receta);

    header("Location: lista_recetas.php");
    exit();
}

$recetas = $controller->obtenerRecetas();
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
        <h1 class="mb-4">Editar receta</h1>
        
        <div class="row">
            <?php foreach ($recetas as $receta): ?>
                <div class="col-md-6 mb-3">
                    <form action="editar_receta.php" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="id_receta_<?= $receta['id_receta'] ?>" class="form-label">ID de la receta:</label>
                                    <input type="number" class="form-control" id="id_receta_<?= $receta['id_receta'] ?>" name="id_receta" value="<?= $receta['id_receta'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="titulo_<?= $receta['id_receta'] ?>" class="form-label">Título de la receta:</label>
                                    <input type="text" class="form-control" id="titulo_<?= $receta['id_receta'] ?>" name="titulo" value="<?= htmlspecialchars($receta['titulo']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion_<?= $receta['id_receta'] ?>" class="form-label">Descripción de la receta:</label>
                                    <textarea class="form-control" id="descripcion_<?= $receta['id_receta'] ?>" name="descripcion" rows="4"><?= htmlspecialchars($receta['descripcion']) ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-success mt-2">Editar receta</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
