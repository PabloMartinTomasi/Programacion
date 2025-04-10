package ej7;

public class Furgoneta extends Vehiculo{
	private String tipoCarga;
	
	public Furgoneta(String idVehiculo, int anioAdquisicion, int numeroPlazas, String tipoCarga) {
		super(idVehiculo, anioAdquisicion, numeroPlazas);
		this.tipoCarga = tipoCarga;
	}
	
	@Override
	public void mostrar() {
		System.out.println("Furgoneta - ID del autobus: " + idVehiculo + ", Año de adquisición: " + anioAdquisicion + ", Número de plazas: " + numeroPlazas + ", Tipo de carga: " + tipoCarga);
	}
}
