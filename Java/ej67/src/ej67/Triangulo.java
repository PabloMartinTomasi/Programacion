package ej67;

public class Triangulo implements Figura{
	protected double base;
	protected double altura;
	
	public double calcularArea(double base, double altura) {
		return (base * altura) / 2;
	}
}
