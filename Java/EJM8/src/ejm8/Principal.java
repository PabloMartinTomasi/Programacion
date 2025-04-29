package ejm8;
import java.io.*;
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
	            System.out.println("---MENU---\n 1- Añadir un nuevo libro\n 2- Mostrar todos los libros almacenados \n 3- Buscar un libro por título o autor.\n 4- Salir del programa.");
	            opcion = Integer.parseInt(scanner.nextLine());
	           
	            switch(opcion) {
	                case 1:
	                	agregarLibro();
	                	break;
	                case 2:
	                	todosLibros();
	                	break;
	                case 3:
	                	buscarLibro();
	                	break;
	                case 4:
	                	System.out.println("saliendo...");
	                	break;
	                default:
	                    System.out.println("Selecciona una opcion válida del menu");
	            }
	        }
	        catch (NumberFormatException e) {
	            System.out.println("Por favor ingresa un número válido");
	        }
	    } while(opcion != 4);
	}
	
	public void agregarLibro() {
		System.out.println("Ingresa el titulo del libro: ");
		String titulo = scanner.nextLine();

		System.out.println("Ingresa el nombre del autor del libro: ");
		String autor = scanner.nextLine();

		System.out.println("Ingresa el ISBN del libro: ");
		String ISBN = scanner.nextLine();

		System.out.println("Ingresa el año de publicacion del libro: ");
		int anioPublicacion = scanner.nextInt();

		Libro nuevoLibro = new Libro(titulo, autor, ISBN, anioPublicacion);
		List<Libro> libros = new ArrayList<>();

		try {
			File file = new File("biblioteca.ser");
			if (file.exists()) {
				ObjectInputStream in = new ObjectInputStream(new FileInputStream(file));
				libros = (List<Libro>) in.readObject();
				in.close();
			}
			libros.add(nuevoLibro);
			ObjectOutputStream out = new ObjectOutputStream(new FileOutputStream(file));
			out.writeObject(libros);
			out.close();
			System.out.println("Libro agregado correctamente.");
		} 
		catch (IOException | ClassNotFoundException e) {
			System.out.println("Error guardando el libro: " + e.getMessage());
		}
	}

	public void todosLibros() {
	    try {
	        ObjectInputStream in = new ObjectInputStream(new FileInputStream("biblioteca.ser"));
	        List<Libro> libros = (List<Libro>) in.readObject();
	        in.close();
	        
	        if (libros.isEmpty()) {
	            System.out.println("No se han encontrado libros en la biblioteca.");
	        } else {
	            System.out.println("---Libros de la biblioteca---\n");
	            for (Libro libro : libros) {
	                System.out.println(libro.mostrarDatos());
	            }
	        }
	    } catch (IOException | ClassNotFoundException e) {
	        System.out.println("Error al leer los libros:\n" + e.getMessage());
	    }
	}
	
	public void buscarLibro() {
		System.out.println("Selecciona cómo deseas buscar el libro:\n 1- Por autor\n 2- Por título");
		int eleccion = scanner.nextInt();
		scanner.nextLine(); // Limpiar el salto de línea pendiente

		if (eleccion != 1 && eleccion != 2) {
			System.out.println("Opción inválida. Solo puedes ingresar 1 o 2.");
			return;
		}

		System.out.println("Ingresa el texto a buscar:");
		String busqueda = scanner.nextLine().toLowerCase();

		List<Libro> libros = new ArrayList<>();
		File file = new File("biblioteca.ser");

		if (!file.exists()) {
			System.out.println("No hay libros registrados aún.");
			return;
		}

		try {
			ObjectInputStream in = new ObjectInputStream(new FileInputStream(file));
			libros = (List<Libro>) in.readObject();
			in.close();

			boolean encontrados = false;
			for (Libro libro : libros) {
				boolean coincide = (eleccion == 1 && libro.autor.toLowerCase().contains(busqueda)) ||
				                   (eleccion == 2 && libro.titulo.toLowerCase().contains(busqueda));
				if (coincide) {
					System.out.println(libro);
					encontrados = true;
				}
			}

			if (!encontrados) {
				System.out.println("No se encontraron libros que coincidan con la búsqueda.");
			}
		} catch (IOException | ClassNotFoundException e) {
			System.out.println("Error al buscar libros: " + e.getMessage());
		}
	}

}
