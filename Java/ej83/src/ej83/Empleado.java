package ej83;

public abstract class Empleado implements Pagable{
	protected int id;
	protected String nombre;
	
	public Empleado (int id, String nombre) {
		this.id = id;
		this.nombre = nombre;
	}
	
	public String getNombre() {
        return nombre;
    }
}
