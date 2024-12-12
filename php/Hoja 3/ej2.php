<?php
ini_set('log_errors', 1); 
ini_set('error_log', '/ruta/a/tu/archivo_de_log.log'); 

function validarEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Válido";
    } else {
        error_log("Email inválido: " . $email);
        return "Inválido";
    }
}

echo validarEmail(readline("Pon un email: "));
?>