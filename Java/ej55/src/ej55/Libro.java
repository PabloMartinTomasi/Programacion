package ej55;

public class Libro {
	protected String titulo;
	protected Autor autor;
	
	public Libro(String titulo, Autor autor) {
		this.titulo = titulo;
		this.autor = autor;
	}
	
	public void mostrarDatos() {
		System.out.println("Nombre del autor: " + autor.nombre);
		System.out.println("Nacionalidad del autor: " + autor.nacionalidad);
		System.out.println("Títlo del libro: " + titulo);
	}
}
