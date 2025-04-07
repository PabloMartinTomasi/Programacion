package hito;

public class Gato extends Animal{
	private boolean testLeucemia; //Agregamos el atributo test leucemia a la clase de Gato
	
	public Gato(String numeroChip, String nombre, int edad, String raza, boolean adoptado, boolean testLeucemia) {
		super(numeroChip, nombre, edad, raza, adoptado);//Los atributos que pusimos en la clase de Animal, los ponemos en esta clase
		this.testLeucemia = testLeucemia; //Hacemos publico el atributo de test de leucemia
	}
	
	//Usamos el override, para poder usar el metodo de mostrar datos
	@Override
	public void mostrar() {
		//Imprimimos los datos del gatos
		System.out.println("Gato - Numero del chip: " + numeroChip + ", Nombre: " + nombre + ", Edad: " + edad + ", Raza: " + raza + ", Adoptado: " + adoptado + ", Test de leucemia: " + testLeucemia);
	}
}
