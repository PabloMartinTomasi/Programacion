package ej82;

public class Circulo extends Figura implements Calculable{
	protected double radio;
	
	public Circulo(String color, double radio) {
		super(color);
		this.radio = radio;
	}
	
	public double calcularArea() {
		double PI = 3.1416;
		return PI * radio * radio;
	}
}
