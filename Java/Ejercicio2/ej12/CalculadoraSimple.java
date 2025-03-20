public class CalculadoraSimple{
   public static void main(String[] args){
	int num1 = 10;
	int num2 = 2;
	int resultado;
	
	int suma = num1 + num2;
	System.out.println("La suma de " + num1 + " y de " + num2 + " ,es de " + suma);
	
	int resta = num1 - num2;
	System.out.println("La resta de " + num1 + " y de " + num2 + " ,es de " + resta);

	int multiplicacion = num1 * num2;
	System.out.println("La multiplicación de " + num1 + " y de " + num2 + " ,es de " + multiplicacion);

	int division = num1 / num2;
	System.out.println("La división de " + num1 + " y de " + num2 + " ,es de " + division);
   }
}