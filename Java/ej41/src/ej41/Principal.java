package ej41;

public class Principal {
	public static void main(String[] args) {
		Persona estudiante = new Estudiante("Luis", 17, "Segundo de Bachillerato");
		Persona profesor = new Profesor("Juan", 42, "Matematicas");
		
		mostrarDatosPersona(estudiante);
		mostrarDatosPersona(profesor);
	}
	
	public static void mostrarDatosPersona(Persona persona) {
        persona.mostrarDatos();
    }
}
