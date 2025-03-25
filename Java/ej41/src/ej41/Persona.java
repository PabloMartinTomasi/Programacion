package ej41;

public class Persona {
	protected String nombre;
	protected int edad;
	
	public Persona(String nombre, int edad) {
		this.nombre = nombre;
		this.edad = edad;
	}
	
	void mostrarDatos() {
		System.out.println("Nombre: " + nombre + " || Edad: " + edad);
	}
	
	public void setNombre(String Nombre) {
		Nombre = nombre;
	}

	public String getNombre() {
		return nombre;
	}

	public void setEdad(int Edad) {
		Edad = edad;
	}

	public int getEdad() {
		return edad;
	}
}
