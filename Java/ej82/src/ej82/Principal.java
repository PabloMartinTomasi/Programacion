package ej82;
import java.util.ArrayList;

public class Principal {

	public static void main(String[] args) {
		ArrayList<Figura> figuras = new ArrayList<>();
		
		figuras.add(new Circulo("Rojo", 5));
		figuras.add(new Circulo("Verde", 3));
		figuras.add(new Circulo("Morado", 13));
		
		figuras.add(new Rectangulo("Rojo", 2, 6));
		figuras.add(new Rectangulo("Verde", 3, 7));
		figuras.add(new Rectangulo("Morado", 4, 9));
		
		for (Figura figura : figuras) {
			System.out.println(figura.calcularArea());
		}
	}

}
