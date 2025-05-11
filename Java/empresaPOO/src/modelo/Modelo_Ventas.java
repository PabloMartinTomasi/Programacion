package modelo;
import conexion.Conexion_BBDD;
import java.sql.*;

public class Modelo_Ventas {

    public void agregarVenta(int idCliente, int idArticulo, int cantidad, String fechaVenta) {
        try {
            Connection conexion = new Conexion_BBDD().conexionBBDD();
            if (conexion != null) {
                String sql = "INSERT INTO Ventas (id_cliente, id_articulo, cantidad, fecha_venta) VALUES (?, ?, ?, ?)";
                PreparedStatement stmt = conexion.prepareStatement(sql);

                stmt.setInt(1, idCliente);
                stmt.setInt(2, idArticulo);
                stmt.setInt(3, cantidad);
                stmt.setDate(4, Date.valueOf(fechaVenta));
                stmt.executeUpdate();

                System.out.println("Se ha agregado la nueva venta");
                stmt.close();
                conexion.close();
            }
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }

    public void verVentas() {
        try {
            Connection conexion = new Conexion_BBDD().conexionBBDD();
            if (conexion != null) {
                Statement stmt = conexion.createStatement();
                ResultSet rs = stmt.executeQuery("SELECT * FROM Ventas");

                while (rs.next()) {
                    System.out.println("ID Venta: " + rs.getInt("id_venta") + " - ID Cliente: " + rs.getInt("id_cliente") + " - ID Artículo: " + rs.getInt("id_articulo") + " - Cantidad: " + rs.getInt("cantidad") + " - Fecha: " + rs.getDate("fecha_venta"));
                }
                rs.close();
                stmt.close();
                conexion.close();
            } else {
                System.out.println("No se ha podido conectar con la base de datos");
            }
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }

    public void modificarVenta(int idVenta, int nuevoIdCliente, int nuevoIdArticulo, int nuevaCantidad, String nuevaFecha) {
        try {
            Connection conexion = new Conexion_BBDD().conexionBBDD();
            if (conexion != null) {
                String sql = "UPDATE Ventas SET id_cliente = ?, id_articulo = ?, cantidad = ?, fecha_venta = ? WHERE id_venta = ?";
                PreparedStatement stmt = conexion.prepareStatement(sql);

                stmt.setInt(1, nuevoIdCliente);
                stmt.setInt(2, nuevoIdArticulo);
                stmt.setInt(3, nuevaCantidad);
                stmt.setDate(4, Date.valueOf(nuevaFecha));
                stmt.setInt(5, idVenta);

                int filas = stmt.executeUpdate();
                if (filas > 0) {
                    System.out.println("La venta con el ID " + idVenta + " ha sido actualizada correctamente.");
                } else {
                    System.out.println("No se encontró ninguna venta con el ID " + idVenta);
                }
                stmt.close();
                conexion.close();
            }
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }

    public void eliminarVenta(int idVenta) {
        try {
            Connection conexion = new Conexion_BBDD().conexionBBDD();
            if (conexion != null) {
                String sql = "DELETE FROM Ventas WHERE id_venta = ?";
                PreparedStatement stmt = conexion.prepareStatement(sql);

                stmt.setInt(1, idVenta);
                int filasAfectadas = stmt.executeUpdate();

                if (filasAfectadas > 0) {
                    System.out.println("La venta con el ID " + idVenta + " ha sido eliminada correctamente.");
                } else {
                    System.out.println("No se encontró ninguna venta con el ID " + idVenta);
                }
                stmt.close();
                conexion.close();
            }
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
}

