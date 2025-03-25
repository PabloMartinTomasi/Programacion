package ej40;
import java.util.ArrayList;
import java.util.Scanner;

public class Tienda {
	ArrayList <Producto> productos = new ArrayList<>();
	Scanner scanner = new Scanner(System.in);
	
	public void agregarProducto() {
		System.out.println("Ingresa el nombre del producto: ");
		String nombre = scanner.nextLine();
		
		System.out.println("Ingresa el precio del producto: ");
		double precio = scanner.nextDouble();
		
		System.out.println("Ingresa la cantidad del producto: ");
		int cantidad = scanner.nextInt();
		
		productos.add(new Producto(nombre, precio, cantidad));
	}
	
	public void verProductos() {
		for (Producto p : productos) {
			System.out.println(p);
		}
	}
}
