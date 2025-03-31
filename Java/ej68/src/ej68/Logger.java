package ej68;

public interface Logger {
	void registrar(String mensaje);
	
	default void separador() {
		System.out.println("--------------");
	}
}
