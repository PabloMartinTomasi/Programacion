package vista;
import controlador.Controlador_Clientes;
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
						break;
					case 2:
						break;
					case 3:
						break;
					case 4:
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
	
	

}
