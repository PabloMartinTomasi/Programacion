package ej50;

public class Triangulo extends Figura{
	protected double base;
	protected double altura;
	
	public Triangulo(double base, double altura) {
		this.base = base;
		this.altura = altura;
	}
	
	@Override
	double calcularArea() {
		return (base * altura) * 2;
	}
}
