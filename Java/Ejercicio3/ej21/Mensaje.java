public class Mensaje{
   String texto = "¡Bienvenido al curso de Java!";

   public static void main(String[] args){
	Mensaje mensaje = new Mensaje();
	mensaje.mostrarMensaje();
   }
   
   public void mostrarMensaje(){
	System.out.println(texto);
   }
}