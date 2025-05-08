package modelo;
import conexion.Conexion_BBDD;
import java.sql.*;

public class Modelo_Proveedores {
	public void agregarProoveedor(String nombre, String cif, int telefono) {
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();
			if(conexion != null) {
				String sql = "INSERT INTO proveedores (nombre,cif,telefono) VALUES (?,?,?)";
				PreparedStatement stmt = conexion.prepareStatement(sql);
				
				stmt.setString(1, nombre);
				stmt.setString(2, cif);
				stmt.setInt(3, telefono);
				
				int filas = stmt.executeUpdate();
		        if (filas > 0) {
		        	System.out.println("Se ha agregado el nuevo proveedor");
		         }
		         
		        stmt.close();
		        conexion.close();
			}
		}catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
	}
	
	public void verProveedores() {
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();
			
			if(conexion != null) {
				Statement stmt = conexion.createStatement();
				ResultSet rs = stmt.executeQuery("SELECT * FROM proveedores");
				
				while(rs.next()) {
					System.out.println("ID: " + rs.getInt("id_proveedor") + " - Nombre: " + rs.getString("nombre") + " - Cif: " + rs.getString("cif") + " - Telefono: " + rs.getInt("telefono"));
				}
				
				rs.close();
				stmt.close();
				conexion.close();
			}
		}catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
	}
	
	public void modificarProveedor(String nuevoNombre, String nuevoCif, int nuevoTelefono, int idEditar) {
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();
			if(conexion != null) {
				String sql = "UPDATE proveedores SET nombre = ?, cif = ?, telefono = ? WHERE id_proveedor = ?";
				PreparedStatement stmt = conexion.prepareStatement(sql);
				
				stmt.setString(1, nuevoNombre);
				stmt.setString(2, nuevoCif);
				stmt.setInt(3, nuevoTelefono);
				stmt.setInt(4, idEditar);
				
				int peliculaActualizada = stmt.executeUpdate();
				if(peliculaActualizada > 0) {
					System.out.println("El proveedor con el ID " + idEditar + ". Ha sido editado correctamente");
				} else {
					System.out.println("No se ha podido editar al proveedor con el ID " + idEditar);
				}
				
				stmt.close();
                conexion.close();
			}
		}catch (SQLException e) {
           System.out.println("Error: " + e.getMessage());
       }
	}
	
	public void eliminarProveedor(int idProveedor) {
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();
			if(conexion != null) {
				String sql = "DELETE FROM proveedores WHERE id_proveedor = ?";
				PreparedStatement stmt = conexion.prepareStatement(sql);
				
				stmt.setInt(1, idProveedor);
				int filasAfectadas = stmt.executeUpdate();
				
				if (filasAfectadas > 0) {
                    System.out.println("El proveedor con el ID " + idProveedor + ". Ha sido eliminado corectamente");
                } else {
                    System.out.println("No se encontró un proveedor con el ID " + idProveedor + ". Pruebalo con otro ID");
                }
			}
		}catch (SQLException e) {
           System.out.println("Error: " + e.getMessage());
       }
	}
}
