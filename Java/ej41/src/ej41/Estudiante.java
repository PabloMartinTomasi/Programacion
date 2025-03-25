package ej41;

public class Estudiante extends Persona{
	private String curso;
	
	public Estudiante(String nombre, int edad, String curso) {
		super(nombre, edad);
		this.curso = curso;
		System.out.println("Super en el constructor");
	}
	
	@Override
	void mostrarDatos() {
		System.out.println("Nombre: " + nombre + " || Edad: " + edad + " || Curso: " + curso);
	}
}