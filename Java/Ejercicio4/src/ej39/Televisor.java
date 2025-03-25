package ej39;

public class Televisor extends Electrodomestico{
	private int pulgadas;
	
	public Televisor(String marca, int precio, int pulgadas) {
		super(marca, precio);
		this.pulgadas = pulgadas;
	}
	
	public void mostrarDatos() {
		System.out.println("Marca: " + marca + " || Precio: " + precio + "€ || Capacidad: " + pulgadas);
	}

}
