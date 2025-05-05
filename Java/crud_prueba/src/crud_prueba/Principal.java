package crud_prueba;
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
	            System.out.println("---MENU--- \n1- Añadir nuevo socio \n2- Leer datos de un socio \n3- Actualizar datos de un socio \n4- Eliminar un socio \n5- Salir ");
	            opcion = Integer.parseInt(scanner.nextLine());
	            
	            switch(opcion) {
	                case 1:
	                	agregarSocio();
	                	break;
	                case 2:
	                	obtenerSocios();
	                	break;
	                case 3:
	                	actualizarSocio();
	                	break;
	                case 4:
	                	eliminarSocio();
	                	break;
	                case 5:
	                	System.out.println("SALIENDO");
	                    break;
	                default:
	                    System.out.println("Selecciona una opcion válida del menu");
	            }
	        }
	        catch (NumberFormatException e) {
	            System.out.println("Por favor ingresa un número válido");
	        }
	    } while(opcion != 5);
	}
    
    public void agregarSocio() {
        System.out.print("Ingresa el nombre del socio: ");
        String nombre = scanner.nextLine();

        System.out.println("Ingresa el apellido del socio:");
        String apellido = scanner.nextLine();

        System.out.println("Ingresa el email del socio: ");
        String email = scanner.nextLine();

        System.out.println("Ingresa el teléfono del socio: ");
        int tlf = Integer.parseInt(scanner.nextLine());

        System.out.println("Ingresa la fecha de nacimiento del socio (YYYY-MM-DD): ");
        String fechaTexto = scanner.nextLine();

        try {
            Date fechaNacimiento = Date.valueOf(fechaTexto);

            Connection conn = conexionBBDD();
            if (conn != null) {
                String sql = "INSERT INTO socios (nombre, apellido, email, telefono, fecha_nacimiento) VALUES (?, ?, ?, ?, ?)";
                PreparedStatement stmt = conn.prepareStatement(sql);
                stmt.setString(1, nombre);
                stmt.setString(2, apellido);
                stmt.setString(3, email);
                stmt.setInt(4, tlf);
                stmt.setDate(5, fechaNacimiento);
                stmt.executeUpdate();

                System.out.println("Socio agregado correctamente.");
                stmt.close();
                conn.close();
            }
        } catch (SQLException e) {
            System.out.println("Error al insertar socio: " + e.getMessage());
        } catch (IllegalArgumentException e) {
            System.out.println("Formato de fecha incorrecto. Usa YYYY-MM-DD.");
        }
    }
    
    public void obtenerSocios() {
        try {
            Connection conexion = conexionBBDD();
            if (conexion != null) {
                Statement stmt = conexion.createStatement();
                ResultSet rs = stmt.executeQuery("SELECT * FROM socios");

                while (rs.next()) {
                    System.out.println("ID: " + rs.getInt("id_socio") + " - Nombre: " + rs.getString("nombre") + " - Apellido: " + rs.getString("apellido") + " - Email: " + rs.getString("email") + " - TLF: " + rs.getInt("telefono") + " - Fecha de Nacimiento: " + rs.getDate("fecha_nacimiento"));
                }

                rs.close();
                stmt.close();
                conexion.close();
            }
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }

    public void actualizarSocio() {
        System.out.println("Ingresa el ID del socio que deseas actualizar: ");
        int id_socio = scanner.nextInt();
        scanner.nextLine();

        System.out.print("Ingresa el nombre del socio: ");
        String nombre = scanner.nextLine();

        System.out.println("Ingresa el apellido del socio:");
        String apellido = scanner.nextLine();

        System.out.println("Ingresa el email del socio: ");
        String email = scanner.nextLine();

        System.out.println("Ingresa el teléfono del socio: ");
        int tlf = Integer.parseInt(scanner.nextLine());

        System.out.println("Ingresa la fecha de nacimiento del socio (YYYY-MM-DD): ");
        String fechaTexto = scanner.nextLine();

        try {
            Date fechaNacimiento = Date.valueOf(fechaTexto);

            Connection conexion = conexionBBDD();
            if (conexion != null) {
                String sql = "UPDATE socios SET nombre = ?, apellido = ?, email = ?, telefono = ?, fecha_nacimiento = ? WHERE id_socio = ?";
                PreparedStatement pstmt = conexion.prepareStatement(sql);

                pstmt.setString(1, nombre);
                pstmt.setString(2, apellido);
                pstmt.setString(3, email);
                pstmt.setInt(4, tlf);
                pstmt.setDate(5, fechaNacimiento);
                pstmt.setInt(6, id_socio);

                int filas = pstmt.executeUpdate();

                if (filas > 0) {
                    System.out.println("Los datos del socio con el ID " + id_socio + " han sido actualizados correctamente.");
                } else {
                    System.out.println("No se encontró un socio con el ID " + id_socio);
                }

                pstmt.close();
                conexion.close();
            }
        } catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        } catch (IllegalArgumentException e) {
            System.out.println("Formato de fecha incorrecto. Usa YYYY-MM-DD.");
        }
    }

    
    public void eliminarSocio() {
    	System.out.println("Ingresa el ID del socio que deseas eliminar: ");
    	int id_socio = scanner.nextInt();
    	
    	try {
    		Connection conexion = conexionBBDD();
    		
    		if (conexion != null) {
    			String sql = "DELETE FROM socios WHERE id_socio = ?";
    			PreparedStatement stmt = conexion.prepareStatement(sql);
            	 
    			stmt.setInt( 1, id_socio);
            	int filasAfectadas = stmt.executeUpdate();
            	 
            	if (filasAfectadas > 0) {
                    System.out.println("El socio con el ID " + id_socio + ". Ha sido eliminado corectamente");
                } else {
                    System.out.println("No se encontró un socio con el ID " + id_socio + ". Pruebalo con otro ID");
                }
            	 
            	stmt.close();
                 conexion.close();
            }
    	}catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
    
    public Connection conexionBBDD() {
        String url = "jdbc:mysql://localhost:3306/club_deportivo";
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

