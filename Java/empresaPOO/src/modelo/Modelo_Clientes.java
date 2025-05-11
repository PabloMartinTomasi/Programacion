package modelo;
import conexion.Conexion_BBDD;
import java.sql.*;

public class Modelo_Clientes {
	public void agregarCliente(String nombre, String email, int telefono) {
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();
			
			if(conexion != null) {
				String sql = "INSERT INTO clientes (nombre,email,telefono) VALUES (?,?,?)";
				
				PreparedStatement stmt = conexion.prepareStatement(sql);
				stmt.setString(1, nombre);
				stmt.setString(2, email);
				stmt.setInt(3, telefono);
				stmt.executeUpdate();
				
				System.out.println("Se a agregado el nuevo cliente");
                stmt.close();
                conexion.close();
			}
		}catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
	}
	
	public void verCliente() {
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();
			
			if(conexion != null) {
				Statement stmt = conexion.createStatement();
				
				ResultSet rs = stmt.executeQuery("SELECT * FROM clientes");
				while (rs.next()) {
					System.out.println("ID: " + rs.getInt("id_cliente") + " - Nombre: " + rs.getString("nombre") + " - Email: " + rs.getString("email") + " - Telefono: " + rs.getInt("telefono"));
				}
				rs.close();
				stmt.close();
				conexion.close();
			}else {
				System.out.println("No se ha podido haber conectado con la base de datos");
			}
		}catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
	}
	
	public void modificarCliente(String nuevoNombre, String nuevoEmail, int nuevoTelefono, int idClienteEsEditado) {
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();
			
			if(conexion != null) {
				String sql = "UPDATE clientes SET nombre = ?, email = ?, telefono = ? WHERE id_cliente = ?";
				PreparedStatement stmt = conexion.prepareStatement(sql);
				
				stmt.setString(1, nuevoNombre);
				stmt.setString(2, nuevoEmail);
				stmt.setInt(3, nuevoTelefono);
				stmt.setInt(4,  idClienteEsEditado);
				
				int filas = stmt.executeUpdate();
				if (filas > 0) {
                    System.out.println("Los datos del cliente con el ID " + idClienteEsEditado + " han sido actualizados correctamente.");
                } else {
                    System.out.println("No se encontró ningun cliente con el ID " + idClienteEsEditado);
                }
			}
		}catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
	}
	
	public void eliminarCliente(int idCliente) {
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();
			
			if(conexion != null) {
				String sql = "DELETE FROM clientes WHERE id_cliente = ?";
				PreparedStatement stmt = conexion.prepareStatement(sql);
				
				stmt.setInt(1, idCliente);
				int filasAfectadas = stmt.executeUpdate();
				
				if (filasAfectadas > 0) {
                    System.out.println("El cliente con el ID " + idCliente + ". Ha sido eliminado corectamente");
                } else {
                    System.out.println("No se encontró un cliente con el ID " + idCliente + ". Pruebalo con otro ID");
                }
			}
		}catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
	}
}