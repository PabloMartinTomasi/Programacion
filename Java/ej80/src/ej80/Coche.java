package ej80;

public class Coche extends Vehiculo implements Movible{
	public Coche(int id) {
		super(id);
	}
	
	public void mover() {
		System.out.println("El coche " + id + " se mueve por carretera");
	}
}
