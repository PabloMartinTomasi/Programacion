<?php
require_once '../modelo/class_clientes.php';

class ClientesController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Cliente();
    }

    public function agregarCliente($nombre, $apellido, $email, $edad, $plan, $pack, $duracion, $id_cliente) {
        $this->modelo->agregarCliente($nombre, $apellido, $email, $edad, $plan, $pack, $duracion, $id_cliente);
    }

    public function listarClientes() {
        return $this->modelo->obtenerClientes();
    }

    public function obtenerClientesPorId($id_cliente) {
        $resultado = $this->modelo->obtenerClientesPorId($id_cliente);
        return $resultado;
    }

    public function actualizarCliente($id_cliente, $nombre, $apellido, $email, $edad, $id_factura, $plan, $pack, $duracion) {
        $this->modelo->actualizarCliente($id_cliente, $nombre, $apellido, $email, $edad, $id_factura, $plan, $pack, $duracion);
    }

    public function eliminarCliente($id_cliente) {
        $this->modelo->eliminarCliente($id_cliente);
    }
}
?>
