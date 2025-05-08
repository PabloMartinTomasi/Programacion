package vista;
import controlador.Controlador_Clientes;
import java.sql.*;
import java.util.*;

public class MenuCliente {
	Controlador_Clientes menuClientes = new Controlador_Clientes();
	Scanner scanner = new Scanner (System.in);
	

	public static void main(String[] args) {
		MenuCliente app = new MenuCliente();
	    app.menu();
	}
	
	public void menu() {
		int opcion = 0;
		do {
			try {
				System.out.println("---Gestión de Clientes---");
				System.out.println("1- Añadir cliente");
				System.out.println("2- Listar clientes");
				System.out.println("3- Modificar datos de un cliente");
				System.out.println("4- Eliminar cliente");
				System.out.println("5- Salir");
				opcion = Integer.parseInt(scanner.nextLine());
				
				switch (opcion) {
					case 1:
						agregarCliente();
						break;
					case 2:
						verClientes();
						break;
					case 3:
						modificarCliente();
						break;
					case 4:
						eliminarCliente();
						break;
					case 5:
						System.out.println("Saliendo de la gestion de clientes");
						break;
					default:
						System.out.println("Seleciona una opcion que este en el menu de la gestion de clientes");
				}
			}catch (NumberFormatException e) {
	            System.out.println("Por favor ingresa un número válido");
	        }
		} while(opcion != 5);
	}
	
	public void agregarCliente() {
		System.out.println("Ingresa el nombre del nuevo cliente: ");
		String nombre = scanner.nextLine();
		
		System.out.println("Ingresa el email del cliente: ");
		String email = scanner.nextLine();
		
		System.out.println("Ingresa el numero de telefono del cliente: ");
		int telefono = scanner.nextInt();
        scanner.nextLine();
        
        menuClientes.agregarCliente(nombre, email, telefono);
	}
	
	public void verClientes() {
		menuClientes.verCliente();
	}
	
	public void modificarCliente() {
		System.out.println("Ingresa el ID del cliente que deseas editar: ");
		int idClienteEsEditado = scanner.nextInt();
        scanner.nextLine();
        
        System.out.println("Ingresa el nombre del cliente: ");
        String nuevoNombre = scanner.nextLine();
        
        System.out.println("Ingresa el email: ");
        String nuevoEmail = scanner.nextLine();
        
        System.out.println("Ingresa el numero de telefono: ");
        int nuevoTelefono = scanner.nextInt();
        scanner.nextLine();
        
        menuClientes.modificarCliente(nuevoNombre, nuevoEmail, nuevoTelefono, idClienteEsEditado);
	}
	
	public void eliminarCliente() {
		System.out.println("Ingresa el ID, del cliente que deseas eliminar: ");
		int idCliente = scanner.nextInt();
        scanner.nextLine();
		
		menuClientes.eliminarCliente(idCliente);
	}
}
