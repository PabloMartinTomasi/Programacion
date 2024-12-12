<?php

$fecha_hora = date("Y-m-d H:i:s" ."\n");
$fyh = $fecha_hora . "\n";

file_put_contents("log.txt", $fyh, FILE_APPEND);
echo "Contenido actualizado del archivo, log.txt \n";


?>