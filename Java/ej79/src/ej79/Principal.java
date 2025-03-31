package ej79;

public class Principal {

	public static void main(String[] args) {
		String [] nombres = {"Juan", "Ana", "Luis", "Fernando"};
		
		for(int i = 0; i < nombres.length; i++) {
			nombres[i] = nombres[i].toUpperCase();
		}
		
		for (String nombre : nombres) {
			System.out.println(nombre);
		}
	}
}
