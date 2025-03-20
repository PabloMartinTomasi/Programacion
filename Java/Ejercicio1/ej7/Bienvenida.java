public class Bienvenida{
    public static void main(String[] args){
	Bienvenida bienvenida = new Bienvenida();
	bienvenida.mostrarSaludo("Pablo", 18);
    }

    public void mostrarSaludo(String nombre, int edad){
	System.out.println("Hola " + nombre + " tienes " + edad + " años");
    }
}