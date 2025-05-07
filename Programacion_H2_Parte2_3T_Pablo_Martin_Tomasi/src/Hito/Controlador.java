package Hito;
//Importamos el java.sql, para poder realizar las consultas necesarias
import java.sql.*;

public class Controlador {
	public void verPeliculas() {//funcion que nos permite ver las peliculas
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();//Esto nos sirve para poder conectarnos a la base de datos
			if (conexion != null) {
				Statement stmt = conexion.createStatement();
				ResultSet rs = stmt.executeQuery("SELECT p.idPelicula, p.titulo, p.duracionMin, p.director, c.categoria, p.aniPublicacion FROM peliculas p inner join categoria c ON p.idCategoria = c.idCategoria;");//Sentencia para poder selecionar las peliculas disponibles
				
				while (rs.next()) {
                    System.out.println("ID: " + rs.getInt("idPelicula") + " - Titulo: " + rs.getString("titulo") + " - Duracion en min: " + rs.getInt("duracionMin") + " - Director: " + rs.getString("director") + " - Categoria: " + rs.getString("categoria") + " - Lanzamiento: " + rs.getDate("aniPublicacion"));//Aqui se imprime los datos de las peliculas y tambien la categoria
                }
				System.out.println("\n");
				
				//Los close nos sirve para poder cerrar todo corectamente
				rs.close();
                stmt.close();
                conexion.close();
			}
		}catch (SQLException e) {
            System.out.println("Error: " + e.getMessage());
        }
	}
	
	public void agregarPelicula(String titulo, int duracionMin, String director, int idCategoria, String aniPublicacion) {//Metodo para agregar pelicula
		try {
			Date lanzamiento = Date.valueOf(aniPublicacion);//Transforma el atributo String de aniPublicacion a un atributo de Date llamado lanzamiento
			
			Connection conexion = new Conexion_BBDD().conexionBBDD();//Conexion con la base de datos
			if(conexion != null) {
				 int proximoID = obtenerNuevoIDPelicula();//Nos sirve para tener un nuevo ID
				 String sql = "INSERT INTO peliculas (idPelicula, titulo, duracionMin, director, idCategoria, aniPublicacion) VALUES (?, ?, ?, ?, ?, ?)";//Sentencia para añadir una nueva pelicula
				 PreparedStatement stmt = conexion.prepareStatement(sql);
				 //Datos que ha introducido el usuario para la nueva pelicula
				 stmt.setInt(1, proximoID);
				 stmt.setString(2, titulo);
				 stmt.setInt(3, duracionMin);
				 stmt.setString(4, director);
		         stmt.setInt(5, idCategoria);
		         stmt.setDate(6, lanzamiento);
		         int filas = stmt.executeUpdate();
		         
		         if (filas > 0) {
		        	 System.out.println("La pelicula con el ID: " + proximoID + " y titulada " + titulo + ". Ha sido añadido correctamente");//Mensaje de confirmacion, para decir que se a agregado la nueva pelicula
		         }
		         
		         stmt.close();
		         conexion.close();
			}
		}catch (SQLException e) {
	        System.out.println("Error al obtener el siguiente ID: " + e.getMessage());
	    }catch (IllegalArgumentException e) {
            System.out.println("Has utilizado incorectamente el formato de fecha. Utiliza este YYYY-MM-DD");//Si la fecha introducida no es YYYY-MM-DD, sale un error
        }
	}
	
	public void eliminarPelicula(int idPelicula){//Metodo para eliminar una pelicula
		try {
			Connection conexion = new Conexion_BBDD().conexionBBDD();//Conexion a base de datos
			if(conexion != null) {
				String sql = "DELETE FROM peliculas WHERE idPelicula = ?";//Sentencia, para eliminar una pelicula
				PreparedStatement stmt = conexion.prepareStatement(sql);
				
				stmt.setInt(1, idPelicula);
                int filasAfectadas = stmt.executeUpdate();
                
                if (filasAfectadas > 0) {
                	System.out.println("La pelicula con el ID " + idPelicula + ". Ha sido eliminada correctamente");//Mensaje para confirmar de que la pelicula a sido eliminada corectamente
                }
                else {
                	System.out.println("No se ha podido eliminar la pelicula con este ID " + idPelicula + ". Ya que no existe. \nPrueba con otro ID");//Mensaje para decir que no se a encontrado ninguna pelicula con ese ID
                }
                 
                stmt.close();
                conexion.close();
			}
		}catch(SQLException e) {
			 System.out.println("Error: " + e.getMessage());
		}
	}
	
	public void modificarPelicula(String nuevoTitulo, int nuevaDuracionMin, String nuevoDirector, int nuevoIdCategoria, String nuevoAniPublicacion, int idPeliculaModificar) {//Metodo para modificar los datos de una pelicula
		try {
			Date lanzamiento = Date.valueOf(nuevoAniPublicacion);//Transforma el atributo String de nuevoAniPublicacion a un atributo de Date llamado lanzamiento
			
			Connection conexion = new Conexion_BBDD().conexionBBDD();
			if(conexion != null) {
				String sql = "UPDATE peliculas SET titulo = ?, duracionMin = ?, director = ?, idCategoria = ?, aniPublicacion = ? WHERE idPelicula = ?";//Sentencia para poder modificar los datos de la pelicula
				PreparedStatement stmt = conexion.prepareStatement(sql);
				
				//Datos introducidos por el usuario, para poder modificar los datos de la pelicula
				stmt.setString(1, nuevoTitulo);
				stmt.setInt(2, nuevaDuracionMin);
				stmt.setString(3, nuevoDirector);
				stmt.setInt(4,  nuevoIdCategoria);
				stmt.setDate(5, lanzamiento);
				stmt.setInt(6, idPeliculaModificar);
				
				int peliculaActualizada = stmt.executeUpdate();
				if(peliculaActualizada > 0) {
					System.out.println("La pelicula con el ID " + idPeliculaModificar + ". Ha sido actualizada correctamente");//Mesaje para confirma que se ha actualizado corectamente la pelicula
				} else {
					System.out.println("No se ha podido actualizar la pelicula con el ID " + idPeliculaModificar + ". Intentalo de nuevo con otro ID");//Mensaje que nos dice de que el ID de la pelicula, es uno que no es correcto
				}
				
				stmt.close();
                conexion.close();
			}
		}catch(SQLException e) {
			 System.out.println("Error: " + e.getMessage());
		}catch (IllegalArgumentException e) {
            System.out.println("Has utilizado incorectamente el formato de fecha. Utiliza este YYYY-MM-DD");//Si la fecha introducida no es YYYY-MM-DD, sale un error
        }
	}
	
	private int obtenerNuevoIDPelicula() {//Con este metodo nos va a servir para cuando el usuario añada una pelicula, no tenga que introducir el ID
	    int proximoID = 1; 
	    try {
	        Connection conexion = new Conexion_BBDD().conexionBBDD(); // Conexión a la base de datos
	        if (conexion != null) {
	            Statement stmt = conexion.createStatement();
	            ResultSet rs = stmt.executeQuery("select max(idPelicula) as maxID from peliculas");//Sentencia para poder sacar el ultimo ID de la tabla de  peliculas
	            if (rs.next()) {
	                int maxId = rs.getInt("maxId");
	                proximoID = maxId + 1;//Lo que hace esto es sumar 1 al ultimo ID de la pelicula
	            }
	            rs.close();
	            stmt.close();
	            conexion.close();
	        }
	    } catch (SQLException e) {
	        System.out.println("Error al obtener el siguiente ID: " + e.getMessage());
	    }
	    return proximoID;//Nos retorna el nuevo ID, que nos va a servir para añadir la pelicula
	}

}