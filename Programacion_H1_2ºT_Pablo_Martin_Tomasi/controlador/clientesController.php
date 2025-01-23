<?php
require_once '../modelo/class_clientes.php';

class ClientesController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Cliente();
    }

    public function agregarCliente($nombre, $apellido, $email, $telefono, $edad) {
        $this->modelo->agregarCliente($nombre, $apellido, $email, $telefono, $edad);
    }

    public function listarClientes() {
        return $this->modelo->obtenerClientes();
    }

    public function obtenerClientesPorId($id_cliente) {
        return $this->modelo->obtenerClientesPorId($id_cliente);
    }

    public function actualizarCliente($id_cliente, $nombre, $apellido, $email, $telefono, $edad) {
        $this->modelo->actualizarCliente($id_cliente, $nombre, $apellido, $email, $telefono, $edad);
    }

    public function eliminarCliente($id_cliente) {
        $this->modelo->eliminarCliente($id_cliente);
    }
}
?>
