package hito;

public class Perro extends Animal{
	private String tamanio; //Agregamos el atributo tamaño en la clase de perro
	
	public Perro(String numeroChip, String nombre, int edad, String raza, boolean adoptado, String tamanio) {
		super(numeroChip, nombre, edad, raza, adoptado);//Los atributos que pusimos en la clase de Animal, los ponemos en esta clase
		this.tamanio = tamanio; //Hacemos publico el atributo de tamaño
	}
	
	//Usamos el override, para poder usar el metodo de mostrar datos
	@Override
	public void mostrar() {
		//Imprimimos los datos del perro
		System.out.println("Perro - Numero del chip: " + numeroChip + ", Nombre: " + nombre + ", Edad: " + edad + ", Raza: " + raza + ", Adoptado: " + adoptado + ", Tamaño: " + tamanio);
	}
}
