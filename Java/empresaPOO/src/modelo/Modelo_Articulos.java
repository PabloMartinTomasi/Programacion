package modelo;
import conexion.Conexion_BBDD;
import java.sql.*;

public class Modelo_Articulos {
	public void agregarArticulos(String nombre, double precio_unitario, int stock) {
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();
			
			if(conexion != null) {
				String sql = "INSERT INTO artiulos (nombre,precio_unitario,stock) VALUES (?,?,?)";
				
				PreparedStatement stmt = conexion.prepareStatement(sql);
				stmt.setString(1, nombre);
				stmt.setDouble(2, precio_unitario);
				stmt.setInt(3, stock);
				stmt.executeUpdate();
				
				System.out.println("Se a agregado el nuevo articulo");
                stmt.close();
                conexion.close();
			}
		}catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
	}
	
	public void verArticulos() {
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();

			if(conexion != null) {
				Statement stmt = conexion.createStatement();
				
				ResultSet rs = stmt.executeQuery("SELECT * FROM artiulos");
				while (rs.next()) {
					System.out.println("ID: " + rs.getInt("id_articulo") + " - Nombre: " + rs.getString("nombre") + " - Precio unitario: " + rs.getDouble("precio_unitario") + " - Stock: " + rs.getInt("stock"));
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
	
	public void editarArticulo(String nombreNuevo, double precioUnitarioNuevo, int stockNuevo, int idNuevo) {
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();
			
			if(conexion != null) {
				String sql = "UPDATE articulos SET nombre = ?, precio_unitario = ?, stock = ? WHERE id_articulo = ?";
				PreparedStatement stmt = conexion.prepareStatement(sql);
				
				stmt.setString(1, nombreNuevo);
				stmt.setDouble(2, precioUnitarioNuevo);
				stmt.setInt(3, stockNuevo);
				stmt.setInt(4,  idNuevo);
				
				int filas = stmt.executeUpdate();
				if (filas > 0) {
                    System.out.println("Los datos del articulo con el ID " + idNuevo + " han sido actualizados correctamente.");
                } else {
                    System.out.println("No se encontró ningun articulo con el ID " + idNuevo);
                }
			}
		}catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
	}
	
	public void eliminarArticulo(int id_articulo) {
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();
			
			if(conexion != null) {
				String sql = "DELETE FROM articulos WHERE id_articulo = ?";
				PreparedStatement stmt = conexion.prepareStatement(sql);
				
				stmt.setInt(1, id_articulo);
				int filasAfectadas = stmt.executeUpdate();
				
				if (filasAfectadas > 0) {
                    System.out.println("El articulo con el ID " + id_articulo + ". Ha sido eliminado corectamente");
                } else {
                    System.out.println("No se encontró un articulo con el ID " + id_articulo + ". Pruebalo con otro ID");
                }
			}
		}catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
	}
}
