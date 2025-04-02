package ej83;

public class EmpleadoFijo extends Empleado implements Pagable{
	protected double salarioBase;
	
	public EmpleadoFijo(int id, String nombre, double salarioBase) {
		super(id, nombre);
		this.salarioBase = salarioBase;
	}
	
	public double calcularSalarioMensual() {
		return salarioBase;
	}
}
