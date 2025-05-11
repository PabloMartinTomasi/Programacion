package vista;
import controlador.Controlador_Articulos;
import java.sql.*;
import java.util.*;

public class MenuArticulos {
	Controlador_Articulos menuArticulos = new Controlador_Articulos();
	Scanner scanner = new Scanner (System.in);

	public static void main(String[] args) {
		MenuArticulos app = new MenuArticulos();
	    app.menu();
	}
	
	public void menu() {
		int opcion = 0;
		do {
			try {
				System.out.println("---Gestión de Artículos---");
				System.out.println("1- Añadir artículo");
				System.out.println("2- Listar artículos");
				System.out.println("3- Modificar datos de un artículo");
				System.out.println("4- Eliminar artículo");
				System.out.println("5- Salir");
				opcion = Integer.parseInt(scanner.nextLine());
				
				switch (opcion) {
					case 1:
						agregarArticulos();
						break;
					case 2:
						verArticulos();
						break;
					case 3:
						editarArticulo();
						break;
					case 4:
						eliminarArticulo();
						break;
					case 5:
						System.out.println("Saliendo de la gestion de artículos");
						break;
					default:
						System.out.println("Seleciona una opcion que este en el menu de la gestion de artículos");
				}
			}catch (NumberFormatException e) {
	            System.out.println("Por favor ingresa un número válido");
	        }
		} while(opcion != 5);
	}
	
	public void agregarArticulos(){
		System.out.println("Introduce el nombre del nuevo articulo: ");
		String nombre = scanner.nextLine();
		
		System.out.println("Ingresa el precio unitario del articulo: ");
		Double precio_unitario = scanner.nextDouble();
		scanner.nextLine();
		
		System.out.println("Ingresa el stock del articulo: ");
		int stock = scanner.nextInt();
		scanner.nextLine();
		
		menuArticulos.agregarArticulos(nombre, precio_unitario, stock);
	}
	
	public void verArticulos() {
		menuArticulos.verArticulos();
	}
	
	public void editarArticulo() {
		System.out.println("Ingresa el id del articulo: ");
		int idNuevo = scanner.nextInt();
		scanner.nextLine();
		
		System.out.println("Introduce el nombre del articulo: ");
		String nombreNuevo = scanner.nextLine();
		
		System.out.println("Ingresa el precio unitario del articulo: ");
		Double precioUnitarioNuevo = scanner.nextDouble();
		scanner.nextLine();
		
		System.out.println("Ingresa el stock del producto: ");
		int stockNuevo = scanner.nextInt();
		scanner.nextLine();
		
		menuArticulos.editarArticulo(nombreNuevo, precioUnitarioNuevo, stockNuevo, idNuevo);
	}
	
	public void eliminarArticulo() {
		System.out.println("Ingresa el ID del articulo que deseas eliminar: ");
		int id_articulo = scanner.nextInt();
		scanner.nextLine();
		
		menuArticulos.eliminarArticulo(id_articulo);
	}
}
