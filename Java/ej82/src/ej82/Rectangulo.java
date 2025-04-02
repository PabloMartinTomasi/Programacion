package ej82;

public class Rectangulo extends Figura implements Calculable{
	protected double ancho;
	protected double alto;
	
	public Rectangulo(String color, double ancho, double alto) {
		super(color);
		this.ancho = ancho;
		this.alto = alto;
	}
	
	public double calcularArea() {
		return ancho * alto;
	}
}
