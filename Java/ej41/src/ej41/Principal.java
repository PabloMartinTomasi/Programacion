package ej41;

public class Principal {
	public static void main(String[] args) {
		Persona persona = new Persona("Juan", 15);
		persona.mostrarDatos();
		
		Persona estudiante = new Estudiante("Luis", 17, "Segundo de Bachillerato");
		estudiante.mostrarDatos();
	}
}
