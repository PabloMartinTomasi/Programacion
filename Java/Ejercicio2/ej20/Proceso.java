public class Proceso{
   public static void main(String[] args){
	Proceso proceso = new Proceso();
	proceso.pasoDos();
   }
   
   public void pasoUno(){
	System.out.println("Iniciando proceso...");
   }
   
   public void pasoDos(){
	Proceso proceso = new Proceso();
	proceso.pasoUno();
	System.out.println("Proceso completado");
   }
}