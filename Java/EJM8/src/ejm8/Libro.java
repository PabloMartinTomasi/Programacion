package ejm8;
import java.io.*;

public class Libro implements Serializable{
	private static final long serialVersionUID = 1L;
	
	protected String titulo;
	protected String autor;
	protected String ISBN;
	protected int anioPublicacion;
	
	public Libro(String titulo, String autor, String ISBN, int anioPublicacion) {
		this.titulo = titulo;
		this.autor = autor;
		this.ISBN = ISBN;
		this.anioPublicacion = anioPublicacion;
	}
	
	public String mostrarDatos() {
		return "Título: " + titulo + " | Autor: " + autor + " | ISBN: " + ISBN + " | Año: " + anioPublicacion;
	}
}
