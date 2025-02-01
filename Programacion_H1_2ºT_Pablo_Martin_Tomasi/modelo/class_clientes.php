<?php
require_once '../config/conexion.php';//Decimos que que es necesario el archivo class_clientes que esta en la carpeta modelo
class Cliente {
    private $conexion;//Definimos una propiedad privada para poder manejar la conexión con la BBDD

    public function __construct() {
        $this->conexion = new Conexion();//Instanciamos a un objeto de la clase Conexion para gestionar la conexión
    }

    //Método para añadir un nuevo cliente
    public function agregarCliente($nombre, $apellido, $email, $edad, $plan, $pack, $duracion, $id_cliente) {
        $this->conexion->conexion->begin_transaction();//Inicia una transacción para asegurar que ambas inserciones se realicen

        try {
            //Consulta para insertar datos del cliente
            $queryCliente = "INSERT INTO clientes (nombre, apellido, email, edad) VALUES (?, ?, ?, ?)";
            $stmtCliente = $this->conexion->conexion->prepare($queryCliente);
            $stmtCliente->bind_param("ssss", $nombre, $apellido, $email, $edad);//Vincula los parámetros a la consulta

            //Ejecuta la consulta y verifica si tiene a tenido éxito
            if (!$stmtCliente->execute()) {
                throw new Exception("Error al agregar cliente: " . $stmtCliente->error);//Si en caso ocurre un error, lanza una mensaje
            }

            //Obtiene el ID del cliente insertado
            $id_cliente = $this->conexion->conexion->insert_id;

            //Consulta para poder insertar los datos de inscripción relacionados a la del cliente
            $queryInscripcion = "INSERT INTO inscripcion (id_cliente, plan, pack, duracion) VALUES (?, ?, ?, ?)";
            $stmtInscripcion = $this->conexion->conexion->prepare($queryInscripcion);
            $stmtInscripcion->bind_param("isss", $id_cliente, $plan, $pack, $duracion);

            //Ejecuta la consulta de inscripción
            if (!$stmtInscripcion->execute()) {
                throw new Exception("Error al agregar la inscripción del cliente: " . $stmtInscripcion->error);//Si en caso ocurre un error, lanza una mensaje
            }

            $this->conexion->conexion->commit();//Si todo es exitoso, confirma la transacción

            echo "Cliente y su inscripción agregados con éxito.";

        } catch (Exception $e) {
            $this->conexion->conexion->rollback();//Si ocurre un error, deshace la transacción
            echo $e->getMessage();
        }

        //Cierre de las sentencias preparadas
        $stmtCliente->close();
        $stmtInscripcion->close();
    }

    //Método para obtener la lista de todos los clientes junto con su inscripción
    public function obtenerClientes() {
        $query = "SELECT c.id_cliente, c.nombre, c.apellido, c.email, c.edad,
            i.id_factura, i.plan, i.pack, i.duracion
        FROM clientes c
        JOIN inscripcion i
        ON c.id_cliente = i.id_cliente";
        $resultado = $this->conexion->conexion->query($query);//Ejecutamos la consulta
        $socios = [];//Arreglo para almacenar los resultados
        while ($fila = $resultado->fetch_assoc()) {
            $socios[] = $fila;//Agrega cada fila al arreglo
        }
        return $socios;//Devuelve los resultados de los clientes
    }

    //Método para obtener la lista de todos los clientes junto con su inscripción
    public function obtenerClientesPorId($id_cliente) {
        $query = "SELECT c.id_cliente, c.nombre, c.apellido, c.email, c.edad, 
                i.id_factura, i.plan, i.pack, i.duracion
              FROM clientes c 
              INNER JOIN inscripcion i ON c.id_cliente = i.id_cliente
              WHERE c.id_cliente = ?";
        $stmt = $this->conexion->conexion->prepare($query);//Prepara la consulta
        $stmt->bind_param("i", $id_cliente);//Vincula el parámetro id_cliente
        $stmt->execute();//Ejecuta la consulta
        $resultado = $stmt->get_result();//Obtiene el resultado de la ejecución

        //Si encuentra al cliente, podremos ver los datos de ese cliente 
        if ($resultado->num_rows > 0){
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else{
            return [];//Si no encuentra el cliente, devuelve una imagen blanca
        }
    }

    //Método para actualizar los datos de un cliente y su inscripción
    public function actualizarCliente($id_cliente, $nombre, $apellido, $email, $edad, $id_factura, $plan, $pack, $duracion) {
        $this->conexion->conexion->begin_transaction();//Inicia una transacción
    
        try {
            //Verifica de que todos los campos necesarios estén llenos
            if (empty($nombre) || empty($apellido) || empty($email) || empty($plan) || empty($pack) || empty($duracion)) {
                throw new Exception("Todos los campos son obligatorios.");
            }
    
            //Hace la consulta para actualizar los datos del cliente
            $queryCliente = "UPDATE clientes SET nombre = ?, apellido = ?, email = ?, edad = ? WHERE id_cliente = ?";
            $stmtCliente = $this->conexion->conexion->prepare($queryCliente);
            $stmtCliente->bind_param("ssssi", $nombre, $apellido, $email, $edad, $id_cliente);
    
            //Ejecuta la consulta y verifica si ha tenido éxito
            if (!$stmtCliente->execute()) {
                throw new Exception("Error al actualizar cliente: " . $stmtCliente->error);
            }
    
            //Consulta para actualizar los datos de inscripción del cliente
            $queryInscripcion = "UPDATE inscripcion SET id_cliente = ?, plan = ?, pack = ?, duracion = ? WHERE id_factura = ?";
            $stmtInscripcion = $this->conexion->conexion->prepare($queryInscripcion);
            $stmtInscripcion->bind_param("isssi", $id_cliente, $plan, $pack, $duracion, $id_factura); 
    
            //Ejecuta la consulta de inscripción
            if (!$stmtInscripcion->execute()) {
                throw new Exception("Error al actualizar la inscripción del cliente: " . $stmtInscripcion->error);
            }
    
            $this->conexion->conexion->commit();//Si todo es exitoso, confirma la transacción
    
            echo "Cliente y su inscripción actualizados con éxito.";//Mensaje de éxito
    
        } catch (Exception $e) {
            $this->conexion->conexion->rollback();//Si ocurre un error, deshace la transacción
            echo "Error: " . $e->getMessage();//Muestra el mensaje de error
        } finally {
            //Cierra las sentencias preparadas
            if (isset($stmtCliente)) {
                $stmtCliente->close();
            }
            if (isset($stmtInscripcion)) {
                $stmtInscripcion->close();
            }
        }
    }
    
    //Método para poder eliminar a un cliente y su inscripción
    public function eliminarCliente($id_cliente) {
        try {
            //Consulta para eliminar la inscripción del cliente
            $queryInscripcion = "DELETE FROM inscripcion WHERE id_cliente = ?";
            $stmtInscripcion = $this->conexion->conexion->prepare($queryInscripcion);
            $stmtInscripcion->bind_param("i", $id_cliente);

            if (!$stmtInscripcion->execute()) {
                throw new Exception("Error al eliminar la inscripcion: " . $stmtInscripcion->error);
            }

            //Consulta para eliminar el cliente
            $queryCliente = "DELETE FROM clientes WHERE id_cliente = ?";
            $stmtCliente = $this->conexion->conexion->prepare($queryCliente);
            $stmtCliente->bind_param("i", $id_cliente);

            if (!$stmtCliente->execute()) {
                throw new Exception("Error al elimar al cliente: " . $stmtCliente->error);
            }

            $this->conexion->conexion->commit();//Si todo es exitoso, confirma la transacción

            echo "Cliente y su inscripción eliminados con éxito.";//Mensaje de éxito

        } catch (Exception $e) {
            $this->conexion->conexion->rollback();//Si ocurre un error, deshace la transacción
            echo $e->getMessage();//Muestra el mensaje de error
        }

        //Cierra las sentencias preparadas
        $stmtInscripcion->close();
        $stmtCliente->close();
    }
}
?>
