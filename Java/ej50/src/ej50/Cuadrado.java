package ej50;

public class Cuadrado extends Figura{
	protected double lado;
	
	public Cuadrado(double lado) {
		this.lado = lado;
	}
	
	@Override
	double calcularArea() {
		return lado * 2;
	}
}
