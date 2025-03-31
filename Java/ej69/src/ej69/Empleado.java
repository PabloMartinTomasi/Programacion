package ej69;

public class Empleado implements Identificable{
	protected int ID;
	protected String nombre;
	
	public Empleado(int ID, String nombre) {
		this.ID = ID;
		this.nombre = nombre;
	}
	
	public void mostrarIdentidad() {
		System.out.println("ID: " + ID + " || Nombre: " + nombre);
	}
}
