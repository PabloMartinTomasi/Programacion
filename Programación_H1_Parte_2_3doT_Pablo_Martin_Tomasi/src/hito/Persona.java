package hito;

public class Persona {//clase de persona, para poder introducir los datos de quien el que adopta
	protected String nombre;
	protected String dni;
	protected int animalAdoptado;
	
	public Persona(String nombre, String dni, int animalAdoptado) {
		this.nombre = nombre;
		this.dni = dni;
		this.animalAdoptado = animalAdoptado;
	}
}
