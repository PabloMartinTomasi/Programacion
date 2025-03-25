package ej39;

public class Principal {
	public static void main(String[] args) {
		Electrodomestico Lavadora = new Lavadora("Cecotec Bolero DressCode 8500", 319, 8);
		((Lavadora) Lavadora).mostrarDatos();
		
		Electrodomestico Televisor = new Televisor("Samsung TV OLED S93D", 1049, 55);
		((Televisor) Televisor).mostrarDatos();
	}
}
