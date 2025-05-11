package controlador;
import modelo.Modelo_Informe_Clientes;
import java.sql.*;

public class Controlador_Informe_Clientes {
	Modelo_Informe_Clientes controladorInformeClientes = new Modelo_Informe_Clientes();
	
	public void mostrarInformeClientes() {
		controladorInformeClientes.mostrarInformeClientes();
	}

}
