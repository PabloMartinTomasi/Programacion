<?php
error_reporting(E_ALL);

class Personaje{
    public $nombre;
    public $nivel;
    public $puntosVida;
    public $puntosAtaque;

    public function atacar(Personaje $objetivo){
        echo "{$this->nombre} se prepara para atacar a {$objetivo->nombre}.\n{$this->nombre} su ataque le ha quitado a su rival {$this->puntosAtaque}.\n\n";
        $objetivo->puntosVida -= $this->puntosAtaque;
        if ($objetivo->puntosVida < 0){
            $objetivo->puntosVida = 0;
        }
        echo "Ahora {$this->nombre} tiene un total de {$this->puntosVida} de puntos de vida.\n\n";
    }

    public function curarse(){
        $cura = 20;
        $this->puntosVida += $cura;
        echo "{$this->nombre}, se ha curado. Y tiene ahora {$this->puntosVida} puntos de vida.\n\n";
    }

    public function subirNivel(){
        $this->nivel++;
        $this->puntosAtaque += 5;
        $this->puntosVida += 10;
        echo "{$this->nombre} acaba de subir al nivel {$this->nivel}.\n";
        echo "Su ataque es de {$this->puntosAtaque}, y su nueba vida es de {$this->puntosVida} puntos de vida.\n\n";    
    }
}



$Heroe = new Personaje();

$Heroe->nombre="Juan Pedro Montoya";
$Heroe->nivel=1;
$Heroe->puntosVida=35;
$Heroe->puntosAtaque=15;


$Villano = new Personaje();

$Villano->nombre="Fernando Alonso";
$Villano->nivel=3;
$Villano->puntosVida=50;
$Villano->puntosAtaque=20;



$Heroe->atacar($Villano);

$Villano->curarse();

$Villano->atacar($Heroe);

$Villano->subirNivel();

$Heroe->subirNivel();

$Heroe->atacar($Villano);


?>