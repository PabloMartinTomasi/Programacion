public class Calculadora{
   public static void main(String[] args){
	Calculadora calculadora = new Calculadora();
	calculadora.doble(2);
   }
   
   public void doble(int numero){
	int dobleNumero = numero * 2;
	System.out.println(dobleNumero);
   }
}