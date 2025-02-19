<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pregunta = trim($_POST['pregunta']);

    if (!empty($pregunta)) {
        $puerto = "1234";
        $url = "http://localhost:$puerto/v1/chat/completions";

        $datos = array(
            "model" => "llama-3.2-1b-instruct",
            "messages" =>
            array(
                array("role" => "system", "content" => "Responde siempre en español, siempre menciona cuántas personas puede servir la receta al principio de la respuesta."),
                array("role" => "user", "content" => $pregunta)
            ),
            "temperature" => 0.7,
            "max_tokens" => -1,
            "stream" => false
        );

        $jsonDatos = json_encode($datos);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDatos);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonDatos)
        ));
        $respuesta = curl_exec($ch);

        if (curl_errno($ch)) {
            $respuesta_desencriptada = '<p style="color: red;">Error en cURL: ' . curl_error($ch) . '</p>';
        } else {
            $datos_respuesta = json_decode($respuesta, true);

            if (isset($datos_respuesta['choices'][0]['message']['content'])) {
                $respuesta_desencriptada = nl2br(htmlspecialchars($datos_respuesta['choices'][0]['message']['content']));
            } else {
                $respuesta_desencriptada = '<p style="color: red;">No se recibió una respuesta válida.</p>';
            }
        }

        curl_close($ch);
    }
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
                    <a class="nav-link" href="index.php">Pregunta</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="vista/lista_recetas.php">Recetas registradas</a>
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
                        <?php echo $respuesta_desencriptada; ?>
                    </div>

                    <form action="vista/crear_receta.php" method="post">
                        <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($pregunta); ?>">
                        <input type="hidden" name="descripcion" value="<?php echo htmlspecialchars($respuesta_desencriptada); ?>">
                        <button type="submit" class="btn btn-success">Guardar receta</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>