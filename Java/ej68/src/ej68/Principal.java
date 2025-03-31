package ej68;

public class Principal {

	public static void main(String[] args) {
		Logger logger = new ConsolaLogger();
		
		logger.registrar("Inciando");
		logger.separador();
		logger.registrar("Se ha iniciado correctamente");
		logger.separador();
	}

}
