public class Comparador{
   public static void main(String[] args){
	Comparador comparador = new Comparador();
	comparador.compararNumeros(2, 4);
   }
   
   public void compararNumeros(int a, int b){
	if (a>b){
		System.out.println("El valor de 'a' es mas grande que el valor de 'b'");
	}else if (a<b){
		System.out.println("El valor de 'a' es mas pequeños que el valor de 'b'");
	}else{
		System.out.println("El valor de 'a' es igual al valor de 'b'");
	}
   }
}