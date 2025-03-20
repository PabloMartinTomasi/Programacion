public class BreakContinue{
   public static void main(String[] args){
	for (int i = 1; i <= 11; i++){
		if (i == 5){
			continue;
		} else if (i == 8){
			break;
		}
		System.out.println("Numero: " + i);
        }
   }
}