package ej77;
import java.util.ArrayList;

public class Principal {

	public static void main(String[] args) {
		ArrayList<Producto> Productos = new ArrayList<>();
		
		Productos.add(new Producto("Pantalón corto de running", 30));
		Productos.add(new Producto("Mallas térmicas", 45));
		Productos.add(new Producto("Chaqueta cortavientos", 60));
		Productos.add(new Producto("Zapatillas de running", 120));
		Productos.add(new Producto("Gorra deportiva", 18));
		
		for (Producto Producto : Productos) {
			if (Producto.precio > 50) {
				System.out.println(Producto.nombre);
			}
		}
	}

}
