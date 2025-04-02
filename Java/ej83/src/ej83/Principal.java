package ej83;
import java.util.HashMap;

public class Principal {
	public static void main(String[] args) {
		HashMap<Integer, Empleado> empleados = new HashMap<>();
		
		empleados.put(1, new EmpleadoFijo(1, "Juan", 1500));
		empleados.put(2, new EmpleadoFijo(1, "Fernando", 1450));
		empleados.put(3, new EmpleadoFijo(1, "Javier", 1000));
		
		empleados.put(4, new EmpleadoPorHoras(1, "Luis", 8, 9));
		empleados.put(5, new EmpleadoPorHoras(1, "Francisco", 8, 7));
		empleados.put(6, new EmpleadoPorHoras(1, "Paco", 7, 5));
		
		for (Empleado empleado : empleados.values()) {
            System.out.println("Empleado: " + empleado.getNombre() + " || Salario: " + empleado.calcularSalarioMensual());
        }
	}
}
