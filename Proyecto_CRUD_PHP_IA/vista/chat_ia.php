<?php
require_once __DIR__ . '/../controlador/IAController.php';

$controller = new IAController();
$respuesta_desencriptada = "";
$pregunta = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['pregunta'])) {
    $pregunta = trim($_POST['pregunta']);
    $respuesta_desencriptada = $controller->respuesta($pregunta);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Blog de recetas</title>
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
                    <a class="nav-link" href="chat_ia.php">Pregunta</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="lista_recetas.php">Recetas registradas</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h1>IA</h1>
                <form method="post">
                    <div class="mb-3">
                        <textarea rows="3" cols="50" placeholder="Pregunta sobre una receta..." name="pregunta" id="pregunta" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Lanzar pregunta" class="btn btn-primary">
                    </div>
                </form>

                <?php if (!empty($respuesta_desencriptada)): ?>
                    <div class="alert alert-info mt-3">
                        <strong>Título:</strong> <?php echo htmlspecialchars($pregunta); ?><br>
                        <?php echo nl2br($respuesta_desencriptada); ?>
                    </div>

                    <form action="crear_receta.php" method="post">
                        <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($pregunta); ?>">
                        <input type="hidden" name="descripcion" value="<?php echo str_replace('<br />', "\n", $respuesta_desencriptada); ?>">
                        <button type="submit" class="btn btn-success">Guardar receta</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>