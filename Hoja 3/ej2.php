<?php

function validarEmail($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return "Válido";
    } else{
        error_log("Correo inválido: $email\n", 3, "errores.log");
        return "Error registrado en errores.log";
    }
}

$gmail = readline("Pon el email: ");
echo validarEmail($gmail);

?>