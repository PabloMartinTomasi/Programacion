package prueba;
import java.sql.*;

public class ConexionBasica {
    public static void main(String[] args) {
        String url = "jdbc:mysql://localhost:33/club_deportivo";
        String usuario = "root";
        String contraseña = "";

        try {
            Connection conexion = DriverManager.getConnection(url, usuario, contraseña);
            Statement stmt = conexion.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT * FROM socios");

            while (rs.next()) {
                System.out.println("ID: " + rs.getInt("id") + " Nombre: " + rs.getString("nombre"));
            }

            stmt.close();
            conexion.close();
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
}