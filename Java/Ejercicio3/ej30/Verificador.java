public class Verificador{
   public static void main(String[] args){
	Verificador verificador = new Verificador();
	boolean esPar = verificador.esPositivoYPar(5);
	System.out.println("¿El número es positivo y par? " + esPar);
   }
   
   public boolean esPositivoYPar(int numero){
	return numero > 0 && numero % 2 == 0;
   }
}