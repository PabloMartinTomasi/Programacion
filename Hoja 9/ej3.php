<?php

class Usuario{
    private $nombre;
    private $email;

    public function __construct($nombre, $email){
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function mostrarInfo(){
        echo "Datos del usuario:\nNombre: {$this->nombre} | Email: {$this->email}\n\n";
    }
}

class Administrador extends Usuario{
    private $nivelAcceso;

    public function __construct($nombre, $email, $nivelAcceso){
        parent::__construct($nombre, $email);
        $this->nivelAcceso = $nivelAcceso;
    }

    public function mostrarInfo(){
        parent::mostrarInfo();
        echo "Nivel de acceso: {$this->nivelAcceso}";
    }
}


$usuario = new Usuario("Juan", "ejemplo@gmail.com");
$usuario->mostrarInfo();

$administrador = new Administrador("Luis", "ejemploo@gmail.com", "Guardia");
$administrador->mostrarInfo();

?>