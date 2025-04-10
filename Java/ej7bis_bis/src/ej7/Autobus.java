package ej7;

public class Autobus extends Vehiculo{
	private boolean aptoMovilidadReducida;
	
	public Autobus(String idVehiculo, int anioAdquisicion, int numeroPlazas, boolean aptoMovilidadReducida) {
		super(idVehiculo, anioAdquisicion, numeroPlazas);
		this.aptoMovilidadReducida = aptoMovilidadReducida;
	}
	
	@Override
	public void mostrar() {
		System.out.println("Autobus - ID del autobus: " + idVehiculo + ", Año de adquisición: " + anioAdquisicion + ", Número de plazas: " + numeroPlazas + ", Apto para movilidad reducida: " + aptoMovilidadReducida);
	}
}
