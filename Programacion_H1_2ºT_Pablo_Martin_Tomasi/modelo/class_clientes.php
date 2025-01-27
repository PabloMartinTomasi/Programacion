<?php
require_once '../config/conexion.php';

class Cliente {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function agregarCliente($nombre, $apellido, $email, $edad, $plan, $pack, $duracion, $id_cliente) {
        $this->conexion->conexion->begin_transaction();

        try {
            $queryCliente = "INSERT INTO clientes (nombre, apellido, email, edad) VALUES (?, ?, ?, ?)";
            $stmtCliente = $this->conexion->conexion->prepare($queryCliente);
            $stmtCliente->bind_param("ssss", $nombre, $apellido, $email, $edad);

            if (!$stmtCliente->execute()) {
                throw new Exception("Error al agregar cliente: " . $stmtCliente->error);
            }

            $id_cliente = $this->conexion->conexion->insert_id;

            $queryInscripcion = "INSERT INTO inscripcion (id_cliente, plan, pack, duracion) VALUES (?, ?, ?, ?)";
            $stmtInscripcion = $this->conexion->conexion->prepare($queryInscripcion);
            $stmtInscripcion->bind_param("isss", $id_cliente, $plan, $pack, $duracion);

            if (!$stmtInscripcion->execute()) {
                throw new Exception("Error al agregar la inscripción del cliente: " . $stmtInscripcion->error);
            }

            $this->conexion->conexion->commit();

            echo "Cliente y su inscripción agregados con éxito.";

        } catch (Exception $e) {
            $this->conexion->conexion->rollback();
            echo $e->getMessage();
        }

        $stmtCliente->close();
        $stmtInscripcion->close();
    }

    public function obtenerClientes() {
        $query = "SELECT c.id_cliente, c.nombre, c.apellido, c.email, c.edad,
            i.id_factura, i.plan, i.pack, i.duracion
        FROM clientes c
        JOIN inscripcion i
        ON c.id_cliente = i.id_cliente";
        $resultado = $this->conexion->conexion->query($query);
        $socios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $socios[] = $fila;
        }
        return $socios;
    }

    public function obtenerClientesPorId($id_cliente) {
        $query = "SELECT c.id_cliente, c.nombre, c.apellido, c.email, c.edad, 
                i.id_factura, i.plan, i.pack, i.duracion
              FROM clientes c 
              INNER JOIN inscripcion i ON c.id_cliente = i.id_cliente
              WHERE c.id_cliente = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_cliente);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado->num_rows > 0){
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else{
            return [];
        }
    }

    public function actualizarCliente($id_cliente, $nombre, $apellido, $email, $edad, $id_factura, $plan, $pack, $duracion) {
        $this->conexion->conexion->begin_transaction();
    
        try {
            if (empty($nombre) || empty($apellido) || empty($email) || empty($plan) || empty($pack) || empty($duracion)) {
                throw new Exception("Todos los campos son obligatorios.");
            }
    
            $queryCliente = "UPDATE clientes SET nombre = ?, apellido = ?, email = ?, edad = ? WHERE id_cliente = ?";
            $stmtCliente = $this->conexion->conexion->prepare($queryCliente);
            $stmtCliente->bind_param("ssssi", $nombre, $apellido, $email, $edad, $id_cliente);
    
            if (!$stmtCliente->execute()) {
                throw new Exception("Error al actualizar cliente: " . $stmtCliente->error);
            }
    
            $queryInscripcion = "UPDATE inscripcion SET id_cliente = ?, plan = ?, pack = ?, duracion = ? WHERE id_factura = ?";
            $stmtInscripcion = $this->conexion->conexion->prepare($queryInscripcion);
            $stmtInscripcion->bind_param("isssi", $id_cliente, $plan, $pack, $duracion, $id_factura); 
    
            if (!$stmtInscripcion->execute()) {
                throw new Exception("Error al actualizar la inscripción del cliente: " . $stmtInscripcion->error);
            }
    
            $this->conexion->conexion->commit();
    
            echo "Cliente y su inscripción actualizados con éxito.";
    
        } catch (Exception $e) {
            $this->conexion->conexion->rollback();
            echo "Error: " . $e->getMessage();
        } finally {
            if (isset($stmtCliente)) {
                $stmtCliente->close();
            }
            if (isset($stmtInscripcion)) {
                $stmtInscripcion->close();
            }
        }
    }
    
    public function eliminarCliente($id_cliente) {
        try {
            $queryInscripcion = "DELETE FROM inscripcion WHERE id_cliente = ?";
            $stmtInscripcion = $this->conexion->conexion->prepare($queryInscripcion);
            $stmtInscripcion->bind_param("i", $id_cliente);

            if (!$stmtInscripcion->execute()) {
                throw new Exception("Error al eliminar la inscripcion: " . $stmtInscripcion->error);
            }

            $queryCliente = "DELETE FROM clientes WHERE id_cliente = ?";
            $stmtCliente = $this->conexion->conexion->prepare($queryCliente);
            $stmtCliente->bind_param("i", $id_cliente);

            if (!$stmtCliente->execute()) {
                throw new Exception("Error al elimar al cliente: " . $stmtCliente->error);
            }

            $this->conexion->conexion->commit();

            echo "Cliente y su inscripción eliminados con éxito.";

        } catch (Exception $e) {
            $this->conexion->conexion->rollback();
            echo $e->getMessage();
        }

        $stmtInscripcion->close();
        $stmtCliente->close();
    }
}
?>
