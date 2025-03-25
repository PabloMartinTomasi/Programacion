package ej54;

public class Vehiculo {
	protected String marca;
	protected String modelo;
	
	public Vehiculo(String marca, String modelo) {
		this.marca = marca;
		this.modelo = modelo;
	}
	
	void mostrarDatos() {
		System.out.println("Marca : " + marca + " || Modelo: " + modelo );
	}
}
