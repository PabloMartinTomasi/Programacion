package ej54;

public class Coche extends Vehiculo{
	private int numPuertas;
	
	public Coche(String marca, String modelo, int numPuertas) {
		super(marca, modelo);
		this.numPuertas = numPuertas;
	}
	
	@Override
	void mostrarDatos() {
		System.out.println("Marca : " + marca + " || Modelo: " + modelo + " || Puertas: " + numPuertas);
	}
}
