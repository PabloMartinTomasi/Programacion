package ej34;

public class Empleado {
	public String nombre;
	private int salario;
	protected String departamento;
	
	public Empleado(String nombre, int salrio, String departamento) {
		this.nombre = nombre;
		this.salario = salario;
		this.departamento = departamento;
	}
	
	public void  mostrarDatos() {
		System.out.println("Nombre: " + nombre);
		System.out.println("Salario: " + salario);
		System.out.println("Departamento: " + departamento);
	}
}
