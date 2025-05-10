<?php
require_once '../modelo/class_clientes.php';//Decimos que que es necesario el archivo class_clientes que esta en la carpeta modelo


class ClientesController {
    private $modelo;//Es una propriedad privada que almacena una instancia del archivo class_clientes


    public function __construct() {
        $this->modelo = new Cliente();
    }


    public function agregarCliente($nombre, $apellido, $email, $edad, $plan, $pack, $duracion, $id_cliente) {
        $this->modelo->agregarCliente($nombre, $apellido, $email, $edad, $plan, $pack, $duracion, $id_cliente);//Llama a la función agregarCliente que esta en el archivo class_clientes
    }//Metodo para poder agregar un nuevo cliente


    public function listarClientes() {
        return $this->modelo->obtenerClientes();//Llama a la función obtenerClientes que esta en el archivo class_clientes
    }//Metodo para poder litar a todos los clientes que han sido registrados


    public function buscarClientePorId($id_cliente) {
        $resultado = $this->modelo->obtenerClientesPorId($id_cliente);//Llama a la función obtenerClientesPorId que esta en el archivo class_clientes
        return $resultado;
    }//Metodo para poder buscar a un cliente con su id


    public function actualizarCliente($id_cliente, $nombre, $apellido, $email, $edad, $id_factura, $plan, $pack, $duracion) {
        $this->modelo->actualizarCliente($id_cliente, $nombre, $apellido, $email, $edad, $id_factura, $plan, $pack, $duracion);//Llama a la función actualizarCliente que esta en el archivo class_clientes
    }//Metodo para poder actualizar los datos de un cliente que ya a sido registrado


    public function eliminarCliente($id_cliente) {
        $this->modelo->eliminarCliente($id_cliente);//Llama a la función eliminarCliente que esta en el archivo class_clientes
    }//Metodo para poder eliminar un cliente que estaba registrado
}
?>
