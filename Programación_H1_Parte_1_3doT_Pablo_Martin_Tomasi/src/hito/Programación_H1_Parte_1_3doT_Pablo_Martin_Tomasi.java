package hito;
//Importamos el Array list para poder tener la lista de los animales que se van añadiendo y el scanner para poder escribir los datos de los animales
import java.util.ArrayList;
import java.util.Scanner;

public class Programación_H1_Parte_1_3doT_Pablo_Martin_Tomasi {
	ArrayList<Animal> animales = new ArrayList<>();//Ponemos el nombre del array list
	Scanner scanner = new Scanner (System.in);// Lo vamos a usar para poder escribir en la terminal
	
	public static void main(String[] args) {//Nos sirve para poder ejecutar el programa para añadir a los nuevos animales
		Programación_H1_Parte_1_3doT_Pablo_Martin_Tomasi app = new Programación_H1_Parte_1_3doT_Pablo_Martin_Tomasi();
	    app.menu();
	}
	
	public void menu() {//Nos sirve para pode selecionar las opciones del menu
	    int opcion = 0;
	    
	    do {
	        try {
	            System.out.println("---MENU---\n 1- Agregar un perro\n 2- Agregar un gato\n 3- Buscar animal por numero de chip\n 4- Salir\n Selecciona una opcion del menu:");//Imprimimos las opciones del menu
	            opcion = Integer.parseInt(scanner.nextLine());//Nos sirve para poder selecionar la opcion del menu
	            
	            switch(opcion) {
	                case 1:
	                    agregarPerro();//Le mandamos a la opcin de agregar a un perro
	                    break;
	                case 2:
	                    agregarGato();// Le mandamos a la opcion de agregar un gato
	                    break;
	                case 3:
	                	buscarNumeroChip();
	                	break;
	                case 4:
	                    System.out.println("SALIENDO");//Saalimos del programa
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


		
	public void agregarPerro() {
		try {
			System.out.println("Ingresa el numero del chip del perro: ");//Solictamos de que se ingrese el numero de chip del perro
		    String numeroChip = scanner.nextLine();

		    if (existeChip(numeroChip)) {
		    	System.out.println("---ERROR---\nYa existe un perro con ese número de chip. Inténtalo con otro.");//Nos salta este mensaje si el codigo del chip ya escite
		        return;
		    }

		    System.out.println("Ingresa el nombre del perro: ");//Nombre del perro
		    String nombre = scanner.nextLine();

		    System.out.println("Ingresa la edad del perro: ");//Edad del perro
		    int edad = Integer.parseInt(scanner.nextLine());

		    System.out.println("Ingresa la raza del perro: ");// Raza del perro
		    String raza = scanner.nextLine();

		    System.out.println("Ingresa si es adoptado o no: ");//True si es adoptado y flase si no es adoptado
		    boolean adoptado = Boolean.parseBoolean(scanner.nextLine());

		    System.out.println("Ingresa el tamaño del perro. Entre pequeño, mediano o grande");//Decimos que ingresen si el tamaño del perro
		    String tamanio = scanner.nextLine();

		     animales.add(new Perro(numeroChip, nombre, edad, raza, adoptado, tamanio));//Agregamos al array los datos del perro
		     System.out.println("El perro ha sido añadido correctamente");
		 }
		 catch (NumberFormatException e) {
			 System.out.println("La edad debe de ser un nuemro valido");
		 }
		 catch (Exception e) {
			 System.out.println("Ha habido un error: " + e.getMessage());
		 }
	}
	
	public void agregarGato() {
	    try {
	        System.out.println("Ingresa el numero del chip del gato: ");//Solicitamos el numero del chip del gato
	        String numeroChip = scanner.nextLine();

	        if (existeChip(numeroChip)) {
	            System.out.println("---ERROR---\nYa existe un gato con ese número de chip. Inténtalo con otro.");//Si el numero de chip del gato ya existe nos salta un mesaje de error
	            return;
	        }

	        System.out.println("Ingresa el nombre del gato: ");//Nombre del gato
	        String nombre = scanner.nextLine();

	        System.out.println("Ingresa la edad del gato: ");//Edad del gato
	        int edad = Integer.parseInt(scanner.nextLine());

	        System.out.println("Ingresa la raza del gato: ");//Raza del gato
	        String raza = scanner.nextLine();

	        System.out.println("Ingresa si es adoptado o no: ");//Ponemos true si el gato es adoptado y flase si no es adoptado
	        boolean adoptado = Boolean.parseBoolean(scanner.nextLine());

	        System.out.println("Ingresa si tiene realizado el test de leucemia o no: ");//Ponemos true si el gato tiene el test de leucemia, y false si no lo tiene
	        boolean testLeucemia = Boolean.parseBoolean(scanner.nextLine());

	        animales.add(new Gato(numeroChip, nombre, edad, raza, adoptado, testLeucemia));//Agregamos los datos del gato al array
	        System.out.println("El gato ha sido añadido correctamente");
	    }
	    catch (NumberFormatException e) {
	        System.out.println("La edad debe de ser un numero valido");
	    }
	    catch (Exception e) {
	        System.out.println("Ha habido un error: " + e.getMessage());
	    }
	}
	
	public boolean existeChip(String chip) {
        for (Animal animal : animales) {//Nos sirve para saber si el numero de chip del gato o del perro ya exuste o no
            if (animal.getNumeroChip().equalsIgnoreCase(chip)) {
                return true;
            }
        }
        return false;
	}
	
	public void buscarNumeroChip() {//Nos sirve para poder buscar cada animal por su numero de chip
		try {
			System.out.println("Introduce el numero de chip: ");//Ponemos el codigo del animal
			String buscarCodigo = scanner.nextLine();
			
			boolean encontrado = false;//Nos sirve para darnos los datos del animal, que su chip se parezca
			 for (Animal animal : animales) {
				 if (animal.getNumeroChip().equalsIgnoreCase(buscarCodigo)) {
					 animal.mostrar();
					 encontrado = true;
					 break;
				 }
			 }
			 if (!encontrado) {
				 System.out.println("No se ha encontrado animal con ese código.");//sale este mensaje si el chip no a sido encontrado
			}

		}
		catch (Exception e) {
	        System.out.println("Ha ocurrido un error: " + e.getMessage());
	    }
	}
}
