public class Conversor{
   public static void main(String[] args){
	Conversor conversor = new Conversor();
	conversor.convertirDoubleAInt(9.99);
   }
   
   public void convertirDoubleAInt(double numero){
	int numEntero = (int) numero;
	System.out.println(numEntero);
   }
}