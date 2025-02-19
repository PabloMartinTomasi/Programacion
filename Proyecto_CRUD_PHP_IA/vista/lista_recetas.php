<?php
require_once '../controlador/RecetasController.php';

$controller = new RecetasController();
$recetas = $controller->obtenerRecetas();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Recetas registradas</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">IA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Pregunta</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../vista/lista_recetas.php">Recetas registradas</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1 class="text-center">Recetas registradas</h1>

    <div class="container">
        <div class="row">
            <?php foreach ($recetas as $receta): ?>
                <div class="col-md-4 mb-3">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Título: <?= htmlspecialchars($receta['titulo']) ?></h5>
                            <p class="card-text"><?= nl2br(htmlspecialchars($receta['descripcion'])) ?></p>
                            <button type="button" class="btn btn-danger">Danger</button>
                            <button type="button" class="btn btn-warning">Warning</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>