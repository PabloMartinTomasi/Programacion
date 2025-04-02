package ej81;

public class Gato extends Animal implements Comunicable{
	public Gato (String nombre) {
		super(nombre);
	}
	
	public String hacerSonido() {
		return "Miau";
	}
}
