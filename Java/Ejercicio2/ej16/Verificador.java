public class Verificador{
   public static void main(String[] args){
	Verificador verificador = new Verificador();
	verificador.esMayorYPar(20);
   }
   
   public void esMayorYPar(int numero){
	boolean mayor = numero > 10;
	System.out.println("El numero " + numero + " es mas grande que 10 " + mayor);
	boolean par = numero % 2 == 0;
	System.out.println("Es par " + par);
   }
}