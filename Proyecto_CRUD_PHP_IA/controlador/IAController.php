<?php
require_once __DIR__ . '/../modelo/class_ia.php';

class IAController{
    private $modelo;

    public function __construct() {
        $this->modelo = new IA();
    }

    public function respuesta($pregunta){
        return $this->modelo->RespuestaIA($pregunta);
    }
}
?>