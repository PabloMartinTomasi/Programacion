package vista;
import controlador.Controlador_Proveedores;
import java.sql.*;
import java.util.*;

public class MenuProveedores {
	Controlador_Proveedores menuProveedores = new Controlador_Proveedores();
	Scanner scanner = new Scanner (System.in);
	
	public static void main(String[] args) {
		MenuProveedores app = new MenuProveedores();
	    app.menu();
	}
	
	public void menu() {
		int opcion = 0;
		do {
			try {
				System.out.println("---Gestión de Proveedores---");
				System.out.println("1- Añadir proveedor");
				System.out.println("2- Listar proveedores");
				System.out.println("3- Modificar datos de un proveedor");
				System.out.println("4- Eliminar proveedor");
				System.out.println("5- Salir");
				opcion = Integer.parseInt(scanner.nextLine());
				
				switch (opcion) {
					case 1:
						agregarProoveedor();
						break;
					case 2:
						verProveedores();
						break;
					case 3:
						modificarProveedor();
						break;
					case 4:
						eliminarProveedor();
						break;
					case 5:
						System.out.println("Saliendo de la gestion de proveedores");
						break;
					default:
						System.out.println("Seleciona una opcion que este en el menu de la gestion de clientes");
				}
			}catch (NumberFormatException e) {
	            System.out.println("Por favor ingresa un número válido");
	        }
		} while(opcion != 5);
	}
	
	public void agregarProoveedor() {
		System.out.println("Ingresa el nombre del nuevo proveedor: ");
		String nombre = scanner.nextLine();
		
		System.out.println("Ingresa el cif del proveedor: ");
		String cif = scanner.nextLine();
		
		System.out.println("Introduce el numero de telefono del nuevo proveedor: ");
		
		System.out.println("Ingresa el numero de telefono del cliente: ");
		int telefono = scanner.nextInt();
        scanner.nextLine();
		
        menuProveedores.agregarProoveedor(nombre, cif, telefono);
	}
	
	public void verProveedores() {
		menuProveedores.verProveedores();
	}
	
	public void modificarProveedor() {
		System.out.println("Ingresa el ID del proveedor para poder editarlo: ");
		int idEditar = scanner.nextInt();
        scanner.nextLine();
        
		System.out.println("Ingresa el nombre del poveedor: ");
		String nuevoNombre = scanner.nextLine();
		
		System.out.println("Ingresa el cif del proveedor: ");
		String nuevoCif = scanner.nextLine();
		
		System.out.println("Introduce el numero de telefono del proveedor: ");
		
		System.out.println("Ingresa el numero de telefono del proveedor: ");
		int nuevoTelefono = scanner.nextInt();
        scanner.nextLine();
        
        menuProveedores.modificarProveedor(nuevoNombre, nuevoCif, nuevoTelefono, idEditar);
	}
	
	public void eliminarProveedor() {
		System.out.println("Ingresa el numero de telefono del cliente: ");
		int idProveedor = scanner.nextInt();
        scanner.nextLine();
		
		menuProveedores.eliminarProveedor(idProveedor);
	}

}