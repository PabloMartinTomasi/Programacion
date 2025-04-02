package ej81;
import java.util.ArrayList;

public class Principal {

	public static void main(String[] args) {
		ArrayList<Animal> animales = new ArrayList<>();
		
		animales.add(new Perro("Perro1"));
		animales.add(new Perro("Perro2"));
		animales.add(new Perro("Perro3"));
		
		animales.add(new Gato("Gato1"));
		animales.add(new Gato("Gato2"));
		animales.add(new Gato("Gato3"));
		
		for (Animal animal : animales) {
			System.out.println(animal.hacerSonido());
		}
	}

}
