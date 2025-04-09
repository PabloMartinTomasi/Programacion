package hito;
//Importamos el Array list para poder tener la lista de los animales que se van añadiendo y el scanner para poder escribir los datos de los animales
import java.util.ArrayList;
import java.util.Scanner;

public class Programación_H1_Parte_2_3doT_Pablo_Martin_Tomasi {

	ArrayList<Animal> animales = new ArrayList<>();//Ponemos el nombre del array list
	Scanner scanner = new Scanner (System.in);// Lo vamos a usar para poder escribir en la terminal
	
	public static void main(String[] args) {//Nos sirve para poder ejecutar el programa para añadir a los nuevos animales
		Programación_H1_Parte_2_3doT_Pablo_Martin_Tomasi app = new Programación_H1_Parte_2_3doT_Pablo_Martin_Tomasi();
	    app.menu();
	}
	
	public void menu() {//Nos sirve para pode selecionar las opciones del menu
	    int opcion = 0;
	    
	    do {
	        try {
	            System.out.println("---MENU---\n 1- Agregar un perro\n 2- Agregar un gato\n 3- Listar todos los animales\n 4- Buscar animal por numero de chip\n 5- Realizar adopción\n 6- Dar de baja a un animal\n 7- Mostrar estaticas de los gatos\n 8- Salir\n Selecciona una opcion del menu:");//Imprimimos las opciones del menu
	            opcion = Integer.parseInt(scanner.nextLine());//Nos sirve para poder selecionar la opcion del menu
	            
	            switch(opcion) {
	                case 1:
	                    agregarPerro();//Le mandamos a la opcin de agregar a un perro
	                    break;
	                case 2:
	                    agregarGato();// Le mandamos a la opcion de agregar un gato
	                    break;
	                case 3:
	                	listarAnimales();//Nos sirve para poder listar a todos los animales
	                	break;
	                case 4:
	                	buscarNumeroChip();//Nos sirve para poder buscar a un animal con numero de chip en concreto
	                	break;
	                case 5:
	                	realizarAdopcion();//Nos sirve para que un cliente pueda realizar la adopcion
	                	break;
	                case 6:
	                	darBajaAnimal();//Nos sirve para poder dar de baja a los animales
	                    break;
	                case 7:
	                	estadisticasDeGatos();//Nos sirve para poder saber cuantos gatos hay y cuantos tienen un test de leucemia
	                	break;
	                case 8:
	                	System.out.println("SALIENDO");//Saalimos del programa
	                    break;
	                default:
	                    System.out.println("Selecciona una opcion válida del menu");//Si se seleciona una opcion que no esta en el menu nos salta este mensaje 
	            }
	        }
	        catch (NumberFormatException e) {
	            System.out.println("Por favor ingresa un número válido");
	        }
	    } while(opcion != 8);//Nos sirve para que cuando se selecione la opcion 8, se cierre el programa
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
	
	public void listarAnimales() {//Aqui vamos a poder listar todos los animales que se encuentran
		try {
			for (Animal animal : animales) {//Con la ayuda de este bucle for areamos un foreach, para poder listar a todos los animales que estan en el array
				animal.mostrar();//Usamos el metodo de mostrar, para poder ver todos los datos de los animales
			}
		}
		catch(Exception e) {
			System.out.println("Ha ocurrido un error: " + e.getMessage());
		}
	}
	
	public void realizarAdopcion() {//Lo vamos a usar para poder adoptar a los animales
		try {
			System.out.println("Introduce el numero de chip del animal que deseas de adoptar: ");//Se solicita al usuario el numero de chip del animal que desea adoptar
			String numeroDeChip = scanner.nextLine();
			
			boolean encontrado = false;//Nos sirve para saber si el animal esta en el array o no
			Animal bajaDeAnimal = null;
			
			for(Animal animal : animales) {
				if(animal.getNumeroChip().equalsIgnoreCase(numeroDeChip)) {
					bajaDeAnimal = animal;
					encontrado = true;
					
					if(animal.adoptado) {
						System.out.println("Este animal ya a sido adoptado");//Nos sale este mensaje si el animal ya a sido adoptado
					}
					else {
						System.out.println("Introduce el nombre de la persona que vaya a adoptar: ");//Si el numero de chip no se a encontrado, se solicita el nombre del usuario
						String nombre = scanner.nextLine();
						
						System.out.println("Introduce el dni de la persona que vaya a adoptar: ");//Se solicita al cliente su DNI
						String dni = scanner.nextLine();
						
						animal.adoptado = true;
						System.out.println("El cliente " + nombre + ", y con el DNI " + dni + ". A adoptado al animal con un el numero de chip "+ numeroDeChip);//Se imprime para confiramar de que el cliente a adoptado correctamente al animal
						animales.remove(bajaDeAnimal);//Eliminamos animal del array
					}
				}
			}
			if(!encontrado) {
				System.out.println("No se a podido encontrar ningun animal con ese numero de chip.");//Si el numero del chip no se a encontrado nos salta este mesanje
			}
		}
		catch(Exception e) {
			System.out.println("Ha ocurrido un error: " + e.getMessage());
		}
	}
	
	public void darBajaAnimal() {//Nos va a servir para poder dar de baja(eliminar) a un animal
		try {
			System.out.println("Introduce el numer de chip del animal que deseas eliminar:");
			String bajaAnimal = scanner.nextLine();//Solicitamos que se ingrese el numero del chip del animal
			
			boolean encontrado = false;//Nos va a servir para saber si el numero de chip existe o no
			Animal bajaDeAnimal = null;
			
			for(Animal animal : animales) {//Bucle for para saber 
				if(animal.getNumeroChip().equalsIgnoreCase(bajaAnimal)) {
					bajaDeAnimal = animal;
					encontrado = true;
					break;
				}
			}
			if(encontrado) {
				animales.remove(bajaDeAnimal);//Nos sirve para poder eliminar el animal del array
				System.out.println("Se ha eliminado correctamente el animal. Con el numero de chip " + bajaAnimal);//Si el numero del chip, se ha encontrado sale el mensaje de que se ha eliminado correctamente el animal
			} else {
				System.out.println("El codigo del animal que has ingresado, es incorecto. Con el numero de chip " + bajaAnimal);//Si el numero del chip no se a encontrado, sale un mensaje diciendo que el chip no se a encontrado
			}
		}
		catch(Exception e) {
			System.out.println("Ha ocurrido un error: " + e.getMessage());
		}
	}
	
	public void estadisticasDeGatos() {//Nos sirve para poder ver las estatisticas de los gatos
		try {
			int totalGatos = 0;//Contador de gatos
			int gatosConTestLeucemia = 0;//Contador de gatos con teste de leucemia
			
			for (Animal animal : animales) {
				if (animal instanceof Gato) {
					totalGatos++;//Sumamos un gato mas, por cada gatos que haya en el array
					
					Gato gato = (Gato) animal;
					if (gato.getTestLeucemia()) {
						gatosConTestLeucemia++;//Si el gato a realizado un test de leucemia, se suma al contador de que a realizado un test de leucemia
	                }
				}
			}
			
			System.out.println("---Estaticas sobre los gatos---\n Hay un total de: " + totalGatos + " de gatos\n Y hay un total de " + gatosConTestLeucemia + " de gatos, que han hecho un test de leucemia.");//Imprimimos las estaticas de los gatos
		}
		catch(Exception e) {
			System.out.println("Ha ocurrido un error: " + e.getMessage());
		}
	}

}
