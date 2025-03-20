import java.util.Scanner;

public class UsarDoWhile{
   public static void main(String[] args){
	Scanner usarDoWhile = new Scanner(System.in);

	int suma = 0;
	int numero;

	do{
		System.out.println("Ingresa una serie de numeros, y si quieres finalizar por 0:");
		numero = usarDoWhile.nextInt();
		suma += numero;
	} while (numero != 0);
	
	System.out.println("El total de la suma es de: " + suma);
   }
}