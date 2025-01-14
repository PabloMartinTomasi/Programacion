<?php

class animal{
    public $especie;

    public function emitirSonido(){
        echo "El animal de especie " . $this->especie . " hace Guau guau! \n";
    }
}

class perro extends animal{
    public $raza;
    public function emitirSonido(){
        echo "El animal de especie " . $this->especie . " y de la raza ". $this->raza . " hace Guau guau!";
    }
}

$miAnimal = new animal();
$miAnimal->especie = "perro";
$miAnimal->emitirSonido();

$Perro = new perro();
$Perro->especie = "perro";
$Perro->raza = "Labrador";
$Perro->emitirSonido()

?>