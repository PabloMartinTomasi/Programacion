package vista;
import controlador.Controlador_Ventas;
import java.sql.*;
import java.util.*;

public class MenuVentas {
    Controlador_Ventas menuVentas = new Controlador_Ventas();
    Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        MenuVentas app = new MenuVentas();
        app.menu();
    }

    public void menu() {
        int opcion = 0;
        do {
            try {
                System.out.println("--- Gestión de Ventas ---");
                System.out.println("1- Añadir venta");
                System.out.println("2- Listar ventas");
                System.out.println("3- Modificar venta");
                System.out.println("4- Eliminar venta");
                System.out.println("5- Salir");
                opcion = Integer.parseInt(scanner.nextLine());

                switch (opcion) {
                    case 1:
                        agregarVenta();
                        break;
                    case 2:
                        verVentas();
                        break;
                    case 3:
                        modificarVenta();
                        break;
                    case 4:
                        eliminarVenta();
                        break;
                    case 5:
                        System.out.println("Saliendo de la gestión de ventas");
                        break;
                    default:
                        System.out.println("Selecciona una opción válida del menú de gestión de ventas");
                }
            } catch (NumberFormatException e) {
                System.out.println("Por favor ingresa un número válido");
            }
        } while (opcion != 5);
    }

    public void agregarVenta() {
        System.out.println("Ingresa el ID del cliente: ");
        int idCliente = Integer.parseInt(scanner.nextLine());

        System.out.println("Ingresa el ID del artículo: ");
        int idArticulo = Integer.parseInt(scanner.nextLine());

        System.out.println("Ingresa la cantidad: ");
        int cantidad = Integer.parseInt(scanner.nextLine());

        System.out.println("Ingresa la fecha de la venta (YYYY-MM-DD): ");
        String fechaVenta = scanner.nextLine();

        menuVentas.agregarVenta(idCliente, idArticulo, cantidad, fechaVenta);
    }

    public void verVentas() {
        menuVentas.verVentas();
    }

    public void modificarVenta() {
        System.out.println("Ingresa el ID de la venta a modificar: ");
        int idVenta = Integer.parseInt(scanner.nextLine());

        System.out.println("Ingresa el nuevo ID del cliente: ");
        int nuevoIdCliente = Integer.parseInt(scanner.nextLine());

        System.out.println("Ingresa el nuevo ID del artículo: ");
        int nuevoIdArticulo = Integer.parseInt(scanner.nextLine());

        System.out.println("Ingresa la nueva cantidad: ");
        int nuevaCantidad = Integer.parseInt(scanner.nextLine());

        System.out.println("Ingresa la nueva fecha de la venta (YYYY-MM-DD): ");
        String nuevaFecha = scanner.nextLine();

        menuVentas.modificarVenta(idVenta, nuevoIdCliente, nuevoIdArticulo, nuevaCantidad, nuevaFecha);
    }

    public void eliminarVenta() {
        System.out.println("Ingresa el ID de la venta a eliminar: ");
        int idVenta = Integer.parseInt(scanner.nextLine());

        menuVentas.eliminarVenta(idVenta);
    }
}
