package ej34;

public class Principal {

	public static void main(String[] args) {
		Empleado empleado1 = new Empleado("Luis", 1250, "RRHH");
		Empleado empleado2 = new Empleado("Juan", 1300, "Administracion");
		
		empleado1.mostrarDatos();
		empleado2.mostrarDatos();
	}

}
