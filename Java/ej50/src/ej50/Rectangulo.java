package ej50;

public class Rectangulo extends Figura{
	protected double base;
	protected double altura;
	
	public Rectangulo(double base, double altura) {
		this.base = base;
		this.altura = altura;
	}
	
	@Override
	double calcularArea() {
		return base * altura;
	}
}
