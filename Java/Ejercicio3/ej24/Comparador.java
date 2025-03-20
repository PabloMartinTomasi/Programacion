public class Comparador{
   public static void main(String[] args){
	Comparador comparador = new Comparador();
	comparador.comparar(5, 8);
   }
   
   public void comparar(int a, int b){
	if (a>b){
		System.out.println("El numero 'a' es mas grande que el numero 'b'");
	} else if(a<b){
		System.out.println("El numero 'a' es mas pequeño que el numero 'b'");
	} else{
		System.out.println("El numero 'a' es igual que el numero 'b'");
	}
   }
}