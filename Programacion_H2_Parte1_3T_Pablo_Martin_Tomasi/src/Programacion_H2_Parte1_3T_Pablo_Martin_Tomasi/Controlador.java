package Programacion_H2_Parte1_3T_Pablo_Martin_Tomasi;
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
}