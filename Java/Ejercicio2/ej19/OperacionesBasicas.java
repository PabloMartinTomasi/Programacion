public class OperacionesBasicas{
   public static void main(String[] args){
	OperacionesBasicas operacionesBasicas = new OperacionesBasicas();
	operacionesBasicas.sumar(5, 4);
	operacionesBasicas.restar(10, 5);
	operacionesBasicas.multiplicar(2, 5);
	operacionesBasicas.dividir(10, 2);
   }
   
   public void sumar(int a, int b){
	int suma = a + b;
	System.out.println("El resultado de la suma es: " + suma);
   }

   public void restar(int a, int b){
	int resta = a - b;
	System.out.println("El resultado de la resta es: " + resta);
   }

   public void multiplicar(int a, int b){
	int multiplicacion = a + b;
	System.out.println("El resultado de la multiplicacion es: " + multiplicacion);
   }

   public void dividir(int a, int b){
	int division = a + b;
	System.out.println("El resultado de la division es: " + division);
   }
}