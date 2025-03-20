public class Saludo{
   String mensaje = "Hola, bienvenido a Java";
   
   public static void main(String[] args){
	Saludo saludo = new Saludo();
	saludo.mostrarMensaje();
   }

   public void mostrarMensaje(){
	System.out.println(mensaje);
   }
}