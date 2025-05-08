package controlador;
import modelo.Modelo_Proveedores;
import java.sql.*;

public class Controlador_Proveedores {
	Modelo_Proveedores controladorProveedores = new Modelo_Proveedores();
	
	public void agregarProoveedor(String nombre, String cif, int telefono) {
		controladorProveedores.agregarProoveedor(nombre, cif, telefono);
	}
	
	public void verProveedores() {
		controladorProveedores.verProveedores();
	}
	
	public void modificarProveedor(String nuevoNombre, String nuevoCif, int nuevoTelefono, int idEditar) {
		controladorProveedores.modificarProveedor(nuevoNombre, nuevoCif, nuevoTelefono, idEditar);
	}
	
	public void eliminarProveedor(int idProveedor) {
		controladorProveedores.eliminarProveedor(idProveedor);
	}
}
