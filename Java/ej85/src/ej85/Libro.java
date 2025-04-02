package ej85;

public class Libro extends Item implements Describible{
	protected String titulo;
	
	public Libro(int id, String titulo) {
		super(id);
		this.titulo = titulo;
	}
	
	public String describir() {
		return titulo;
	}
}
