public class Circunferencia{
   public static void main(String[] args){
	Circunferencia circunferenciaa = new Circunferencia();
	double circulo = circunferenciaa.calcularCircunferencia(5);
	System.out.println("La circuferencia del ciculo es de: " + circulo);
   }
   
   public double calcularCircunferencia(double radio){
	final double PI = 3.1416;
	double circunferencia = 2 * PI * radio;
	return circunferencia;
   }
}