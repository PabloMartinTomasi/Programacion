package ej85;
import java.util.HashMap;
import java.util.ArrayList;

public class Principal {

	public static void main(String[] args) {
		HashMap<String, ArrayList<Item>> inventario = new HashMap<>();
		
		inventario.put("Libros", new ArrayList<>());
		inventario.put("Electronicos", new ArrayList<>());
		
		inventario.get("Libros").add(new Libro(1, "Harry Potter y la piedra filosofal"));
        inventario.get("Libros").add(new Libro(2, "Don Quijote de la Mancha"));
        inventario.get("Libros").add(new Libro(3, "El Hobbit"));
        inventario.get("Libros").add(new Libro(4, "El Principito"));
		
        inventario.get("Electronicos").add(new Electronico(1, "Apple"));
        inventario.get("Electronicos").add(new Electronico(2, "Samsung"));
        inventario.get("Electronicos").add(new Electronico(3, "Sony"));
		
        for (String categoria : inventario.keySet()) {
        	 System.out.println("Categoria: " + categoria);
            for (Item item : inventario.get(categoria)) {
                System.out.println("  - " + item.describir());
            }
        }
	}

}