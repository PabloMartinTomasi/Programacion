<?php
error_reporting(E_ALL);

$frase = readline("Intoduce una frase para saber cuantos caracteres tiene: ");
$caracteres = strlen($frase);

echo "Los caracteres que hay en tu frase son " . $caracteres . "\n";

?>