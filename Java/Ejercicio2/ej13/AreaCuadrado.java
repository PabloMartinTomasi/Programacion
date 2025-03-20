public class AreaCuadrado{
   public static void main(String[] args){
	AreaCuadrado areacuadrado = new AreaCuadrado();
	areacuadrado.calcularArea(5);
   }
   
   public void calcularArea(int lado){
	int area = lado * lado;
	System.out.println("El area del cuadrado es " + area);
   }
}