package Hito;
// Importamos java sql que nos va a servir para poder realizar las sentencias sql, en este caso va a ser solo la sentencia de select
import java.sql.*;
// Luego importamos java.util para poder usar el scanner a la hora de elegir una opcion del menu
import java.util.*;

public class Principal {
	Controlador controlador = new Controlador();// Lo vamos a usar para poder relizar operaciones gracias al controlador
	Scanner scanner = new Scanner (System.in);// Nos sirve para poder elegir una opcion del menu

	public static void main(String[] args) {//Nos sirve para poder ejecutar el programa en este caso nos sirve solo para ver las peliculas que esten disponibles
		Principal app = new Principal();
	    app.menu();
	}
	
	public void menu() {//Esta funcion es un menu, donde va a permitir al usuario observar las peliculas que estan disponibles
	    int opcion = 0;
	    
	    do {
	        try {
	            System.out.println("--- MENU --- \n1- Ver películas \n2- Añadir película \n3- Eliminar película \n4- Modificar película \n5- Salir");
	            opcion = Integer.parseInt(scanner.nextLine());
	            
	            switch(opcion) {
	                case 1://Cuando el usuario introduzca 1 en el programa, se nos van a imprimir todas las peliculas que estan disponibles
	                	controlador.verPeliculas();
	                	break;
	                case 2://Opcion para añadir una pelicula
	                	System.out.print("Ingresa el titulo de la nueva pelicula: ");
	                    String titulo = scanner.nextLine();
	                    
	                    System.out.println("Ingresa la duracion de la pelicula en minutos: ");
	                    int duracionMin = scanner.nextInt();
	                    scanner.nextLine();
	                    
	                    System.out.print("Ingresa el director de la pelicula: ");
	                    String director = scanner.nextLine();
	                    
	                    System.out.println("Ingresa la categoria de la pelicula: ");
	                    int idCategoria = scanner.nextInt();
	                    scanner.nextLine();
	                    
	                    System.out.println("Ingresa la fecha de lanzamiento de la pelicula, usando esta forma-->YYYY-MM-DD: ");
	                    String aniPublicacion = scanner.nextLine();
	                    
	                	controlador.agregarPelicula(titulo, duracionMin, director, idCategoria, aniPublicacion);//Con los datos que a ingresado el usuario, se van a ingresar a la base de datos con el metodo de agregarPelicula que esta en el controlador
	                	break;
	                case 3://Opcion para eliminar una pelicula
	                	System.out.println("Ingresa el ID de la pelicula que deseas eliminar: ");
	                	int idPelicula = scanner.nextInt();
	                	scanner.nextLine();
	                	
	                	controlador.eliminarPelicula(idPelicula);//Con el ID que el usuario a introducido para eliminar la pelicula, va a usar el metodo de eliminarPelicula que esta en el controlador
	                	break;
	                case 4://La opcion 4 nos sirve para poder actualizar los datos de la pelicula
	                	System.out.println("Ingresa el ID de la pelicula que deseas actualizar: ");
	                	int idPeliculaModificar = scanner.nextInt();
	                	scanner.nextLine();
	                	
	                	System.out.println("Ingresa el titulo: ");
	                	String nuevoTitulo = scanner.nextLine();
	                	
	                	System.out.println("Ingresa la duracion de la pelicula en minutos: ");
	                    int nuevaDuracionMin = scanner.nextInt();
	                    scanner.nextLine();
	                    
	                    System.out.print("Ingresa el director de la pelicula: ");
	                    String nuevoDirector = scanner.nextLine();
	                    
	                    System.out.println("Ingresa la categoria de la pelicula: ");
	                    int nuevoIdCategoria = scanner.nextInt();
	                    scanner.nextLine();
	                    
	                    System.out.println("Ingresa la fecha de lanzamiento de la pelicula, usando esta forma-->YYYY-MM-DD: ");
	                    String nuevoAniPublicacion = scanner.nextLine();
	                    
	                	controlador.modificarPelicula(nuevoTitulo, nuevaDuracionMin, nuevoDirector, nuevoIdCategoria, nuevoAniPublicacion, idPeliculaModificar);//Con los datos que ha ingresado el usuario, va a usar el metodo de modificarPelicula que esta en el controlador, y se modificara la pelicula con el ID que se ha ingresado
	                	break;
	                case 5://Cuando el usuario, introduzca 5, va a sacar al usuario del programa
	                	System.out.println("SALIENDO");
	                    break;
	                default:
	                    System.out.println("Selecciona una opcion valida del menu");//Si el usuario seleciona una opcion que no este disponible en el menu, nos sale un mensaje de error. Explicando que la opcion que ha elegido no esta disponible en el menu
	            }
	        }
	        catch (NumberFormatException e) {
	            System.out.println("Por favor ingresa un número válido");
	        }
	    } while(opcion != 5);//Nos sirve para que cuando el usuario introduzca la segunda opcion el menu, se salga del programa
	}
}
