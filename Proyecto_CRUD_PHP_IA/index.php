<?php
// 1. Configuración: Definimos el puerto y construimos la URL local.
// Dado que LM Studio se ejecuta en local, usamos 'localhost'.
// Asegúrate de que LM Studio esté corriendo en el puerto 8000.
$puerto = '8000';
$url = "http://localhost:$puerto/v1/completions";  // Asegúrate de que este endpoint coincide con el expuesto por LM Studio.

// 2. Preparar los datos a enviar.
// Creamos un array con la información que queremos enviar al modelo.
// En este ejemplo, enviamos un mensaje (prompt) y configuramos un parámetro como el número máximo de tokens.
$datos = array(
    'prompt' => '¿Hacer unos macarones?',  // Mensaje que se envía al modelo.
    'max_tokens' => 300               // Número máximo de tokens en la respuesta.
);

// Convertir el array a formato JSON.
$jsonDatos = json_encode($datos);

// 3. Inicializar cURL para preparar la petición.
$ch = curl_init($url);

// 4. Configurar cURL:
// - Establecemos que usaremos el método POST.
// - Indicamos que la respuesta se guarde en una variable en lugar de mostrarse directamente.
// - Enviamos el cuerpo de la petición con nuestros datos en formato JSON.
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDatos);

// 5. Configurar las cabeceras HTTP necesarias.
// Es fundamental indicar que el contenido enviado es de tipo JSON.
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonDatos)
));

// 6. Ejecutar la petición y capturar la respuesta del servidor.
$respuesta = curl_exec($ch);

// 7. Comprobar si se produjo algún error en la comunicación.
if (curl_errno($ch)) {
    echo 'Error en cURL: ' . curl_error($ch);
} else {
    // Mostrar la respuesta recibida de LM Studio.
    echo "Respuesta de LM Studio: " . $respuesta;
}

// 8. Cerrar la sesión cURL para liberar recursos.
curl_close($ch);
?>
