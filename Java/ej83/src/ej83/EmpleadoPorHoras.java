package ej83;

public class EmpleadoPorHoras extends Empleado implements Pagable{
	protected double horasTrabajadas;
	protected double tarifaHora;
	
	public EmpleadoPorHoras(int id, String nombre, double horasTrabajadas, double tarifaHora) {
		super(id, nombre);
		this.horasTrabajadas = horasTrabajadas;
		this.tarifaHora = tarifaHora;
	}
	
	public double calcularSalarioMensual() {
		double salario = (horasTrabajadas * tarifaHora) * 30;
		return salario;
	}
}
