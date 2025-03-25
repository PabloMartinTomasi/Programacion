package ej50;

public class Circulo extends Figura{
	protected double radio;
	
	public Circulo (double radio) {
		this.radio = radio;
	}
	
	@Override
	double calcularArea() {
		return Math.PI * radio * 2;
	}
}
