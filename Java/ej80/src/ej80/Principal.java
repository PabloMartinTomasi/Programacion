package ej80;
import java.util.ArrayList;

public class Principal {

	public static void main(String[] args) {
		ArrayList<Vehiculo> vehiculos = new ArrayList<>();
		
		vehiculos.add(new Coche(1));
		vehiculos.add(new Bicicleta(1));
		vehiculos.add(new Coche(2));
		vehiculos.add(new Bicicleta(2));
		vehiculos.add(new Bicicleta(3));
		vehiculos.add(new Bicicleta(4));
		vehiculos.add(new Coche(3));
		vehiculos.add(new Coche(4));
		vehiculos.add(new Coche(5));
		
		for (Vehiculo vehiculo : vehiculos) {
			vehiculo.mover();
		}
	}

}
