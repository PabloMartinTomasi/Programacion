package vista;
import controlador.Controlador_Facturas_Recibidas;
import java.sql.*;
import java.util.*;

public class MenuFacturasRecibidas {
	Controlador_Facturas_Recibidas menuFacturasRecibidas = new Controlador_Facturas_Recibidas();
    Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        MenuFacturasRecibidas app = new MenuFacturasRecibidas();
        app.menu();
    }

    public void menu() {
        int opcion = 0;
        do {
            try {
                System.out.println("--- Gestión de Facturas Recibidas ---");
                System.out.println("1- Añadir factura");
                System.out.println("2- Listar facturas");
                System.out.println("3- Modificar factura");
                System.out.println("4- Eliminar factura");
                System.out.println("5- Salir");
                opcion = Integer.parseInt(scanner.nextLine());

                switch (opcion) {
                    case 1:
                        agregarFactura();
                        break;
                    case 2:
                        verFacturas();
                        break;
                    case 3:
                        modificarFactura();
                        break;
                    case 4:
                        eliminarFactura();
                        break;
                    case 5:
                        System.out.println("Saliendo de la gestión de facturas");
                        break;
                    default:
                        System.out.println("Selecciona una opción válida del menú");
                }
            } catch (NumberFormatException e) {
                System.out.println("Por favor, ingresa un número válido");
            }
        } while (opcion != 5);
    }

    public void agregarFactura() {
        System.out.println("Ingresa el ID del proveedor: ");
        int idProveedor = scanner.nextInt();
        scanner.nextLine();

        System.out.println("Ingresa la fecha (YYYY-MM-DD): ");
        String fecha = scanner.nextLine();

        System.out.println("Ingresa el total de la factura: ");
        double total = scanner.nextDouble();
        scanner.nextLine();

        menuFacturasRecibidas.agregarFactura(idProveedor, fecha, total);
    }

    public void verFacturas() {
    	menuFacturasRecibidas.verFacturas();
    }

    public void modificarFactura() {
        System.out.println("Ingresa el ID de la factura a modificar: ");
        int idFactura = scanner.nextInt();
        scanner.nextLine();

        System.out.println("Ingresa el nuevo ID del proveedor: ");
        int nuevoIdProveedor = scanner.nextInt();
        scanner.nextLine();

        System.out.println("Ingresa la nueva fecha (YYYY-MM-DD): ");
        String nuevaFecha = scanner.nextLine();

        System.out.println("Ingresa el nuevo total de la factura: ");
        double nuevoTotal = scanner.nextDouble();
        scanner.nextLine();

        menuFacturasRecibidas.modificarFactura(nuevoIdProveedor, nuevaFecha, nuevoTotal, idFactura);
    }

    public void eliminarFactura() {
        System.out.println("Ingresa el ID de la factura a eliminar: ");
        int idFactura = scanner.nextInt();
        scanner.nextLine();

        menuFacturasRecibidas.eliminarFactura(idFactura);
    }
}
