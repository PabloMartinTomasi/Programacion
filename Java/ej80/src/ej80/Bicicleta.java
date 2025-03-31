package ej80;

public class Bicicleta extends Vehiculo implements Movible{
	public Bicicleta(int id) {
		super(id);
	}
	
	public void mover() {
		System.out.println("Bicicleta " + id + " pedalea por el carril bici");
	}
}
