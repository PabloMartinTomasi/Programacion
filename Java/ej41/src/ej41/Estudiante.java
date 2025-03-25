package ej41;

public class Estudiante extends Persona{
	private String curso;
	
	public Estudiante(String nombre, int edad, String curso) {
		super(nombre, edad);
		this.curso = curso;
	}
	
	@Override
	void mostrarDatos() {
		System.out.println("Nombre: " + nombre + " || Edad: " + edad + " || Curso: " + curso);
	}
}