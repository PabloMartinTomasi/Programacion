package vista;
import controlador.Controlador_Informe_Clientes;

public class InformeClientes {
	Controlador_Informe_Clientes informeClientes = new Controlador_Informe_Clientes();
	
	public static void main(String[] args) {
		InformeClientes app = new InformeClientes();
		app.informe();
	}

	public void informe() {
		try {
			informeClientes.mostrarInformeClientes();
		}catch (NumberFormatException e) {
            System.out.println("Por favor ingresa un número válido");
        }
	}
}
