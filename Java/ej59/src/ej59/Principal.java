package ej59;

public class Principal {

	public static void main(String[] args) {
		Persona estudiante = new Estudiante("Luis", 17, "Segundo de Bachillerato");
		Persona profesor = new Profesor("Juan", 42, "Matematicas");
		
		System.out.println(estudiante instanceof Persona);
		System.out.println(profesor instanceof Persona);
	}

}
