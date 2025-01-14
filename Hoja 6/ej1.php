<?php

class libro{
    public $titulo;
    public $autor;
    public $numero_paginas;

    public function mostrarInfo(){
        echo "El titulo del libro es: " . $this->titulo . " fue escrito por: " . $this->autor . " y tiene un total de " . $this->numero_paginas . " de paginas";
    }
}

$miLibro = new libro();
$miLibro->titulo = "La Vida de Lazarillo de Tormes";
$miLibro->autor = "anonimo";
$miLibro->numero_paginas = "128";

$miLibro->mostrarInfo();

?>