public class Acciones{
   public static void main(String[] args){
	Acciones acciones = new Acciones();
	acciones.pasoDos();
   }
   
   public void pasoUno(){
	System.out.println("Ejecutando el paso 1");
   }

   public void pasoDos(){
	Acciones acciones = new Acciones();
	acciones.pasoUno();
	System.out.println("Ejecutando paso 2");
   }
}