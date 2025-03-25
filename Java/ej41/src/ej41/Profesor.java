package ej41;

public class Profesor extends Persona{
	private String asignatura;
	
	public Profesor(String nombre, int edad, String asignatura) {
		super(nombre, edad);
		this.asignatura = asignatura;
	}
	
	@Override
	void mostrarDatos() {
		System.out.println("Nombre: " + nombre + " || Edad: " + edad + " || Curso: " + asignatura);
	}
}
