<?php
require_once '../controlador/tareas_controller.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_tarea"], $_POST["estado_tarea"])) {//Es el metodo post, para cuando el usuario este en la lista de sus tareas, pueda actulizar el estado de dicha tarea
    $id_tarea = intval($_POST["id_tarea"]);
    $estado_tarea = $_POST["estado_tarea"];

    $controller = new TareasController();
    $resultado = $controller->actualizar_tarea($id_tarea, $estado_tarea);

    echo json_encode(["success" => $resultado]);
} else {
    echo json_encode(["success" => false, "error" => "Datos no válidos"]);
}
?>
