package ej7;
import java.util.ArrayList;
import java.util.Scanner;

public class Principal {
	ArrayList<Vehiculo> vehiculos = new ArrayList<>();
	Scanner scanner = new Scanner (System.in);

	public static void main(String[] args) {
		Principal app = new Principal();
	    app.menu();
	}
	
	public void menu() {
	    int opcion = 0;
	    
	    do {
	        try {
	            System.out.println("---MENU---\n 1- Agregar un vehiculo\n 2- Mostrar info de los vehiculos\n 3- Buscar vehiculo por su ID\n 4- Eliminar un vehiculo\n 5- Salir");
	            opcion = Integer.parseInt(scanner.nextLine());
	            
	            switch(opcion) {
	                case 1:
	                	agregarVehiculo();
	                	break;
	                case 2:
	                	mostrarInfo();
	                	break;
	                case 3:
	                	buscarVehiculo();
	                	break;
	                case 4:
	                	eliminarVehiculo();
	                	break;
	                case 5:
	                	System.out.println("SALIENDO");
	                    break;
	                default:
	                    System.out.println("Selecciona una opcion válida del menu");
	            }
	        }
	        catch (NumberFormatException e) {
	            System.out.println("Por favor ingresa un número válido");
	        }
	    } while(opcion != 5);
	}
	
	public void agregarVehiculo() {
		try {
			System.out.println("Seleciona vehiculo deseas añadir\n 1- Autobus\n 2- Furgoneta");
			int eleccion = scanner.nextInt();
			scanner.nextLine();
			 
			System.out.print("Ingresa el código: ");
			String idVehiculo = scanner.nextLine();
			 
			boolean existe = false;
	        for (Vehiculo vehiculo : vehiculos) {
	            if (vehiculo.getIdVehiculo().equalsIgnoreCase(idVehiculo)) {
	                existe = true;
	                break;
	            }
	        }
	         
	        if (existe) {
	            System.out.println("Ya existe un vehiculo con ese código. No se ha añadido. Intentalo de nuevo más tarde.");
	            return;
	        }
	         
	        System.out.println("Ingresa el año de adquisicion del vehiculo: ");
	        int anioAdquisicion = scanner.nextInt();
	        scanner.nextLine();
	         
	        System.out.println("Ingresa el numero de plazas que hay en el vehiculo: ");
	        int numeroPlazas = scanner.nextInt();
	        scanner.nextLine();
	         
	        if(eleccion == 1) {
	        	System.out.println("Ingresa si es apto para la movilidad reducida.\n Si = true y No = false: ");
	        	boolean aptoMovilidadReducida = Boolean.parseBoolean(scanner.nextLine());
	        	 
	        	vehiculos.add(new Autobus(idVehiculo, anioAdquisicion, numeroPlazas, aptoMovilidadReducida));
	        	System.out.println("¡El autobus se a añadido correctamente!");
	        }
	         
	         else if(eleccion == 2) {
	        	 System.out.println("Ingresa el tipo de carga de la furgoneta (ejemplo: material deportivo, comida, etc):");
	        	 String tipoCarga = scanner.nextLine();
	        	 
	        	 vehiculos.add(new Furgoneta(idVehiculo, anioAdquisicion, numeroPlazas, tipoCarga));
	        	 System.out.println("¡La furgoneta se a añadido correctamente!");
	         }
		}
		catch (NumberFormatException e) {
            System.out.println("Por favor ingresa un número válido");
        }
	}
	
	public void mostrarInfo() {
		try {
			for (Vehiculo vehiculo : vehiculos) {
				vehiculo.mostrar();
	        }
		}
		catch (NumberFormatException e) {
            System.out.println("Por favor ingresa un número válido");
        }
	}
	
	public void buscarVehiculo() {
		try {
			System.out.println("Introduce el id del vehiculo que deseas buscas: ");
			String idVehiculo = scanner.nextLine();
			
			boolean encontrado = false;
	        for (Vehiculo vehiculo : vehiculos) {
	            if (vehiculo.getIdVehiculo().equalsIgnoreCase(idVehiculo)) {
	            	vehiculo.mostrar();
	                encontrado = true;
	                break;
	            }
	        }
	        
	        if (!encontrado) {
	            System.out.println("No se ha encontrado ningún vehiculo con ese id.");
	        }
		}
		catch (NumberFormatException e) {
            System.out.println("Por favor ingresa un número válido");
        }
	}
	
	public void eliminarVehiculo() {
		System.out.println("Introduce el id del vehiculo que deseas eliminar: ");
		String idVehiculoEliminar = scanner.nextLine();
		
		Vehiculo vehiculoEliminar = null;
		
		for (Vehiculo vehiculo : vehiculos) {
            if (vehiculo.getIdVehiculo().equalsIgnoreCase(idVehiculoEliminar)) {
            	vehiculoEliminar = vehiculo;
                break;
            }
        }
		if (vehiculoEliminar != null) {
			vehiculos.remove(vehiculoEliminar);
            System.out.println("Vehiculo eliminado correctamente.");
		}
        else {
        	System.out.println("No se ha encontrado ningún vehiculo con ese ID.");
        }



	}
}
