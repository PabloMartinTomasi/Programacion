<?php

function convertirTemperatura($valor, $unidad_conversion ){
    try{
        if ($unidad_conversion == "C"){
            $resultado = ($valor - 32) * 5/9;
        } elseif ($unidad_conversion == "F"){
            $resultado = ($valor - 9/5) + 32;
        } else{
            throw new Exception("Unidad de conversión no válida");
        }
        return round($resultado, 2);
    } catch (Exception $e) {
        error_log($e->getMessage() . "\n", 3, "errores.log");
        return "Error registrado en errores.log";
    }
}
            
$valorr = readline("Pon el valor que quieras convertir: ");
$unidadconversion = readline("Pon la unidad de conversion entre C y F:");
echo convertirTemperatura($valorr, $unidadconversion);
            
?>