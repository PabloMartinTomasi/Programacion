package ej78;
import java.util.Iterator;
import java.util.ArrayList;

public class Principal {

	public static void main(String[] args) {
		ArrayList<String> frutas = new ArrayList<>();
		frutas.add("Pera");
		frutas.add("Platano");
		frutas.add("Manzana");
		frutas.add("Fresas");
		
		Iterator<String> it = frutas.iterator();
		
		while (it.hasNext()) {
			String f = it.next();
			if (f.equals("Manzana")) {
				it.remove();
			}
		}
		
		for (String fruta : frutas) {
		    System.out.println(fruta);
		}
	}
}
