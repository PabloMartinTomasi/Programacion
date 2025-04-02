package ej85;

public class Electronico extends Item implements Describible{
	protected String marca;
	
	public Electronico(int id, String marca) {
		super(id);
		this.marca = marca;
	}
	
	public String describir() {
		return marca;
	}
}
