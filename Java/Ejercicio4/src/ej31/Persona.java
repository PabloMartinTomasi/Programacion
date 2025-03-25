package ej31;

public class Persona {
	String nombre;
	int edad;
	
	public static void main(String[] args) {
		Persona persona1 = new Persona();
		persona1.nombre = "Luis";
		persona1.edad = 27;
		persona1.mostarDatos();
		
		Persona persona2 = new Persona();
		persona2.nombre = "Juan";
		persona2.edad = 19;
		persona2.mostarDatos();
	}
	
	public void mostarDatos() {
		System.out.println("Nombre: " + nombre);
		System.out.println("Edad: " + edad);
	}
}
