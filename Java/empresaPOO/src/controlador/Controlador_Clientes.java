package controlador;
import modelo.Modelo_Clientes;
import java.sql.*;

public class Controlador_Clientes {
	Modelo_Clientes controladorClientes = new Modelo_Clientes();
	
	public void agregarCliente(String nombre, String email, int telefono) {
		controladorClientes.agregarCliente(nombre, email, telefono);
	}
	
	public void verCliente() {
		controladorClientes.verCliente();
	}
	
	public void modificarCliente(String nuevoNombre, String nuevoEmail, int nuevoTelefono, int idClienteEsEditado) {
		controladorClientes.modificarCliente(nuevoNombre, nuevoEmail, nuevoTelefono, idClienteEsEditado);
	}
	
	public void eliminarCliente(int idCliente) {
		controladorClientes.eliminarCliente(idCliente);
	}
}