package ej50;

public class Principal {

	public static void main(String[] args) {
		Figura cuadrado = new Cuadrado(4);
		Figura triangulo = new Triangulo(5, 9);
		
		cuadrado.mostrarTipo();
		System.out.println("Area del cuadrado: " + cuadrado.calcularArea());
		
		triangulo.mostrarTipo();
		System.out.println("Area del triangulo: " + triangulo.calcularArea());
	}

}
