package hito;

public abstract class Animal {
	// Añadimos los atributos para poder que van a tener en comun las dos subclasses de animales
	protected String numeroChip;
	protected String nombre;
	protected int edad;
	protected String raza;
	protected boolean adoptado;
	
	public Animal(String numeroChip, String nombre, int edad, String raza, boolean adoptado) {
		this.numeroChip = numeroChip;
		this.nombre = nombre;
		this.edad = edad;
		this.raza = raza;
		this.adoptado = adoptado;
	}
	
	public String getNumeroChip() {
		return numeroChip;
	} //Incluimos un get, para poder tener el numero del chip. 
	
	// Incluimos el metodo mostrar, donde nos va a permitir mostrar los datos de los animales
	public abstract void mostrar();
}
