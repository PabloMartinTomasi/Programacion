package Persona;

public class Persona {
	String nombre;
	int edad;
	
	public static void main(String[] args) {
		Persona persona = new Persona();
	}
	
	public void mostrarDatos() {
		System.out.println("Nombre: " + nombre);
		System.out.println("Edad: " + edad);
	}
}
