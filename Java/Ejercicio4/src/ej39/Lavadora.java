package ej39;

public class Lavadora extends Electrodomestico{
	private int capacidadKg;
	
	public Lavadora(String marca, int precio, int capacidadKg) {
		super(marca, precio);
		this.capacidadKg = capacidadKg;
	}
	
	public void mostrarDatos() {
		System.out.println("Marca: " + marca + " || Precio: " + precio + "€ || Capacidad: " + capacidadKg + "Kg");
	}

}
