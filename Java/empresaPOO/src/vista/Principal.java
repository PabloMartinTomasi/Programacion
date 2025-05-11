package vista;
import vista.*;
import java.util.*;

public class Principal {
	Scanner scanner = new Scanner(System.in);
	
	public static void main(String[] args) {
		Principal app = new Principal();
        app.menu();
	}
	
	public void menu() {
        int opcion = 0;
        do {
            try {
                System.out.println("--- Menú Principal ---");
                System.out.println("1- Gestión de Clientes");
                System.out.println("2- Gestión de Proveedores");
                System.out.println("3- Gestión de Artículos");
                System.out.println("4- Gestión de Facturas Recibidas");
                System.out.println("5- Gestión de Ventas");
                System.out.println("6- Informes de Ventas por Cliente");
                System.out.println("7- SALIR");
                opcion = Integer.parseInt(scanner.nextLine());

                switch (opcion) {
                    case 1:
                        new MenuCliente().menu();
                        break;
                    case 2:
                        new MenuProveedores().menu();
                        break;
                    case 3:
                    	new MenuArticulos().menu();
                    	break;
                    case 4:
                    	new MenuFacturasRecibidas().menu();
                    	break;
                    case 5:
                    	new MenuVentas().menu();
                    	break;
                    case 6:
                    	new InformeClientes().informe();
                    	break;
                    case 7:
                        System.out.println("SALIENDO...");
                        break;
                    default:
                        System.out.println("Selecciona una opción válida.");
                }
            } catch (NumberFormatException e) {
                System.out.println("Por favor ingresa un número válido.");
            }
        } while (opcion != 7);
    }
}
