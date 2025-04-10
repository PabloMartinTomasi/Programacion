package ej7;

public abstract class Vehiculo {
	protected String idVehiculo;
	protected int anioAdquisicion;
	protected int numeroPlazas;
	
	public Vehiculo(String idVehiculo, int anioAdquisicion, int numeroPlazas) {
		this.idVehiculo = idVehiculo;
		this.anioAdquisicion = anioAdquisicion;
		this.numeroPlazas = numeroPlazas;
	}
	
	public abstract void mostrar();
	
	public String getIdVehiculo() {
		return idVehiculo;
	}
}
