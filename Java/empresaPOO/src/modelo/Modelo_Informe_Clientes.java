package modelo;
import conexion.Conexion_BBDD;
import java.sql.*;

public class Modelo_Informe_Clientes {
    public void mostrarInformeClientes() {
        try {
            Connection conexion = new Conexion_BBDD().conexionBBDD();
            if (conexion != null) {
                Statement stmt = conexion.createStatement();
                String sql = "SELECT c.nombre, a.nombre, v.cantidad, v.fecha_venta, (a.precio * v.cantidad) AS TotalGastado FROM Ventas v JOIN Clientes c ON v.id_cliente = c.id_cliente JOIN Articulos a ON v.id_articulo = a.id_articulo ORDER BY c.nombre, v.fecha_venta";
                ResultSet rs = stmt.executeQuery(sql);

                String clienteActual = "";
                while (rs.next()) {
                    String nombreCliente = rs.getString("nombre");
                    
                    if (!nombreCliente.equals(clienteActual)) {
                        clienteActual = nombreCliente;
                        System.out.println("\nCliente: " + clienteActual);
                    }

                    System.out.println("    Artículo: " + rs.getString("nombre") + " - Cantidad: " + rs.getInt("cantidad") + " - Fecha: " + rs.getDate("fecha_venta") + " - Total gastado: " + rs.getDouble("TotalGastado"));
                }

                rs.close();
                stmt.close();
                conexion.close();
            }
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
}
