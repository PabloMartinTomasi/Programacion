public class Usuario{
   private String nombre;
   public static void main(String[] args){
	Usuario usuario = new Usuario();
	usuario.setNombre("Pablo");
	usuario.getNombre();
   }
   
   public void setNombre(String nuevoNombre){
	nombre = nuevoNombre;
   }
   
   public void getNombre(){
	System.out.println(nombre);
   }
}