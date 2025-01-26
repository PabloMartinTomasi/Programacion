<?php
class Conexion { //nos conectamos a la base de datos
    private $servidor = 'localhost'; //Ponemos el nombre del servidor de la base de datos
    private $usuario = 'root'; // Ponemos el usuario de la base de datos
    private $password = 'curso'; //Ponemos la contraseña de la base de datos
    private $base_datos = 'StreamWeb'; //Ponemos el nombre de la base de datos con la que vamos a interactuar
    public $conexion;

    public function __construct() { //usamos una function para conectarnos
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos, 3307);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error); //Si no conseguimos conectarnos nos sale un erros
        }
    }

    public function cerrar() { //Al acabar la interacion con la base de datos, cerramos la conexion
        $this->conexion->close();
    }
}
?>
