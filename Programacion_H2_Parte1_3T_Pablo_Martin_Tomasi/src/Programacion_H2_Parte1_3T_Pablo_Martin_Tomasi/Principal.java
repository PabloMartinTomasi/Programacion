package Programacion_H2_Parte1_3T_Pablo_Martin_Tomasi;
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
	            System.out.println("--- MENU --- \n1- Ver películas \n2- Salir");//Aqui se van a imprimir las opciones que tenemos que son, ver las peliculas disponibles y salir del programa
	            opcion = Integer.parseInt(scanner.nextLine());//Esro nos sirve para poder selecionar una opcion de las que estan disponibles en el menu
	            
	            switch(opcion) {
	                case 1://Cuando el usuario introduzca 1 en el programa, se nos van a imprimir todas las peliculas que estan disponibles
	                	controlador.verPeliculas();
	                	break;
	                case 2:
	                	System.out.println("SALIENDO");//Cuando el usuario, introduzca 2, va a sacar al usuario del programa
	                    break;
	                default:
	                    System.out.println("Selecciona una opcion valida del menu");//Si el usuario seleciona una opcion que no este disponible en el menu, nos sale un mensaje de error. Explicando que la opcion que ha elegido no esta disponible en el menu
	            }
	        }
	        catch (NumberFormatException e) {
	            System.out.println("Por favor ingresa un número válido");
	        }
	    } while(opcion != 2);//Nos sirve para que cuando el usuario introduzca la segunda opcion el menu, se salga del programa
	}
}
