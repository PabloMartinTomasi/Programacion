import misClases.Persona;
import misClases.Estudiante;

public class Principal{
   public static void main(String[] args){
	Persona persona = new Persona();
	persona.presentar();
	
	Estudiante estudiante = new Estudiante();
	estudiante.presentar();
   }
}