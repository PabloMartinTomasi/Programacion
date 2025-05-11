package modelo;
import conexion.Conexion_BBDD;
import java.sql.*;

public class Modelo_Facturas_Recibidas {

    public void agregarFactura(int idProveedor, String fecha, double total) {
        try {
            Connection conexion = new Conexion_BBDD().conexionBBDD();
            if(conexion != null) {
                String sql = "INSERT INTO Facturas_Recibidas (id_proveedor, fecha, total) VALUES (?, ?, ?)";
                PreparedStatement stmt = conexion.prepareStatement(sql);

                stmt.setInt(1, idProveedor);
                stmt.setDate(2, Date.valueOf(fecha));
                stmt.setDouble(3, total);

                int filas = stmt.executeUpdate();
                if (filas > 0) {
                    System.out.println("Factura agregada correctamente.");
                }

                stmt.close();
                conexion.close();
            }
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }

    public void verFacturas() {
        try {
            Connection conexion = new Conexion_BBDD().conexionBBDD();
            if(conexion != null) {
                Statement stmt = conexion.createStatement();
                ResultSet rs = stmt.executeQuery("SELECT * FROM Facturas_Recibidas");

                while(rs.next()) {
                    System.out.println("ID Factura: " + rs.getInt("id_factura") + " - ID Proveedor: " + rs.getInt("id_proveedor") + " - Fecha: " + rs.getDate("fecha") + " - Total: " + rs.getDouble("total"));
                }

                rs.close();
                stmt.close();
                conexion.close();
            }
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }

    public void modificarFactura(int nuevoIdProveedor, String nuevaFecha, double nuevoTotal, int idFactura) {
        try {
            Connection conexion = new Conexion_BBDD().conexionBBDD();
            if(conexion != null) {
                String sql = "UPDATE Facturas_Recibidas SET id_proveedor = ?, fecha = ?, total = ? WHERE id_factura = ?";
                PreparedStatement stmt = conexion.prepareStatement(sql);

                stmt.setInt(1, nuevoIdProveedor);
                stmt.setDate(2, Date.valueOf(nuevaFecha));
                stmt.setDouble(3, nuevoTotal);
                stmt.setInt(4, idFactura);

                int filas = stmt.executeUpdate();
                if (filas > 0) {
                    System.out.println("Factura modificada correctamente.");
                }

                stmt.close();
                conexion.close();
            }
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }

    public void eliminarFactura(int idFactura) {
        try {
            Connection conexion = new Conexion_BBDD().conexionBBDD();
            if(conexion != null) {
                String sql = "DELETE FROM Facturas_Recibidas WHERE id_factura = ?";
                PreparedStatement stmt = conexion.prepareStatement(sql);

                stmt.setInt(1, idFactura);
                int filas = stmt.executeUpdate();

                if (filas > 0) {
                    System.out.println("Factura eliminada correctamente.");
                } else {
                    System.out.println("No se encontró una factura con el ID " + idFactura);
                }

                stmt.close();
                conexion.close();
            }
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
}