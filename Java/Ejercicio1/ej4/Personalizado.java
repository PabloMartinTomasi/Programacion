public class Personalizado{
   public static void main(String[] args){
	Personalizado personalizado = new Personalizado();
	personalizado.mostrarMensaje("Pablo");
   }

   public void mostrarMensaje(String nombre){
	System.out.println("Hola, " + nombre + "!");
   }
}