package ej32;

public class Persona {
	String nombre;
	int edad;
	
	public static void main(String[] args) {
		Persona persona1 = new Persona();
		Persona persona11 = new Persona("Luis");
		Persona persona111 = new Persona("Luis", 18);
		
		persona1.mostrarDatos();
		persona11.mostrarDatos();
		persona111.mostrarDatos();
	}
	
	public Persona() {
		this.nombre = "Desconocido";
		this.edad = 0;
	}
	
	public Persona(String nombre) {
		this.nombre = nombre;
		this.edad = 0;
	}
	
	public Persona(String nombre, int edad){
		this.nombre = nombre;
		this.edad = edad;
	}
	
	public void mostrarDatos() {
		System.out.println("Nombre: " + nombre);
		System.out.println("Edad: " + edad);
	}
}