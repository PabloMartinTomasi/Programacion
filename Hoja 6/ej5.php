<?php

class calculadora{
    public $n1;
    public $n2;

    public function sumar(){
        echo "La suma de " . $this->n1 . " y de " . $this->n2 . " es un total de " . $this->n1 + $this->n2 . " \n";
    }public function restar(){
        echo "La resta de " . $this->n1 . " y de " . $this->n2 . " es un total de " . $this->n1 - $this->n2 . " \n";
    }public function multiplicar(){
        echo "La multiplicacion de " . $this->n1 . " y de " . $this->n2 . " es un total de " . $this->n1 * $this->n2 . " \n";
    } public function dividir() {
        if ($this->n2 == 0) {
            throw new Exception("No se puede dividir entre cero.");
        }echo "La división de " . $this->n1 . " y de " . $this->n2 . " es un total de " . ($this->n1 / $this->n2) . " \n";
    }
}


try {
    $miCalculadora = new calculadora;
    $miCalculadora->n1 = 5;
    $miCalculadora->n2 = 2;
    
    $miCalculadora->sumar();
    $miCalculadora->restar();
    $miCalculadora->multiplicar();
    $miCalculadora->dividir();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>