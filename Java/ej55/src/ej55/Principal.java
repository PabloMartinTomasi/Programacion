package ej55;

public class Principal {

	public static void main(String[] args) {
		Autor autor = new Autor("Antoine de Saint-Exupéry", "Francés");
		Libro libro = new Libro("El principito", autor);
		
		libro.mostrarDatos();
		
	}

}
