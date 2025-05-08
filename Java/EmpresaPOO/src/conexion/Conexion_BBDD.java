package conexion;
import java.sql.*;

public class Conexion_BBDD {
	public Connection conexionBBDD() {//Con esta funcion nos va a permitir poder hacer consultas en la base de datos
		String url = "jdbc:mysql://localhost:33/javapoo";//Aqui tenemos lo que nos va a servir para conectarse a la base de datos. El puerto en este caso es 33, y la base de datos se llama hitocine
		String usuario = "root";
		String contrasena = "";
		
		try {
			return DriverManager.getConnection(url, usuario, contrasena);//Nos va a servir para poder conectarnos a la base de datos
		}catch(SQLException e) {
			System.out.println("Error: " + e.getMessage());
		}
		return null;
	}
}
