package crudPrueba;
import java.sql.*;
import java.util.*;
import java.sql.Date;

public class Principal {
	Scanner scanner = new Scanner (System.in);

	public static void main(String[] args) {
		Principal app = new Principal();
	    app.menu();
	}
	
	public void menu() {
		int opcion = 0;
		
		do {
			try {
				System.out.println("---MENU--- \n1- Añadir un nuevo cliente \n2- Ver a todos los clientes \n3- Actualizar datos de un cliente \n4- Eliminar un cliente \n5- Salir");
				opcion = Integer.parseInt(scanner.nextLine());
				
				switch(opcion) {
					case 1:
						agregarCliente();
						break;
					case 2:
						obtenerClientes();
						break;
					case 3:
						break;
					case 4:
						break;
					case 5:
						System.out.println("---SALIENDO---");
						break;
					default:
						System.out.println("Seleciona una opcion del menu");
				}
			}catch (NumberFormatException e) {
	            System.out.println("Por favor ingresa un número válido");
	        }
		} while(opcion != 5);
	}
	
	public void agregarCliente() {
		System.out.println("Ingresa el nombre del cliente:");
		String nombre = scanner.nextLine();
		
		System.out.println("Ingresa el apellido del cliente:");
		String apellido = scanner.nextLine();
		
		System.out.println("Ingresa el email del cliente:");
		String email = scanner.nextLine();
		
		System.out.println("Ingresa la edad del cliente:");
		int edad = scanner.nextInt();
		
		try {
			Connection conexion = conexionBBDD();
			if(conexion != null) {
				String sql = "INSERT INTO clientes (nombre, apellido, email, edad) VALUES (?,?,?,?)";
				PreparedStatement stmt = conexion.prepareStatement(sql);
				
				stmt.setString(1, nombre);
                stmt.setString(2, apellido);
                stmt.setString(3, email);
                stmt.setInt(4, edad);
                stmt.executeUpdate();

                System.out.println("El cliente a sido añadido corectamente");
                stmt.close();
                conexion.close();
			}
		}catch (SQLException e) {
            System.out.println("Error al insertar socio: " + e.getMessage());
        } catch (IllegalArgumentException e) {
            System.out.println("Formato de fecha incorrecto. Usa YYYY-MM-DD.");
        }
	}
	
	public void obtenerClientes() {
		try {
			Connection conexion = conexionBBDD();
			if(conexion != null) {
				Statement stmt = conexion.createStatement();
                ResultSet rs = stmt.executeQuery("SELECT * FROM clientes");

                while (rs.next()) {
                    System.out.println("ID: " + rs.getInt("id_cliente") + " - Nombre: " + rs.getString("nombre") + " - Apellido: " + rs.getString("apellido") + " - Email: " + rs.getString("email") + " - Edad: " + rs.getInt("edad"));
                }

                rs.close();
                stmt.close();
                conexion.close();
			}
		}catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
	}
	
	
	
	public Connection conexionBBDD() {
        String url = "jdbc:mysql://localhost:3306/stream_web";
        String usuario = "root";
        String contrasena = "curso";

        try {
            return DriverManager.getConnection(url, usuario, contrasena);
        } catch (SQLException e) {
            System.out.println("Error de conexión: " + e.getMessage());
            return null;
        }
    }
}
