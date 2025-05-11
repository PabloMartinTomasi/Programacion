package controlador;
import modelo.Modelo_Articulos;
import java.sql.*;

public class Controlador_Articulos {
	Modelo_Articulos controladorArticulos = new Modelo_Articulos();
	
	public void agregarArticulos(String nombre, double precio_unitario, int stock) {
		controladorArticulos.agregarArticulos(nombre, precio_unitario, stock);
	}
	
	public void verArticulos() {
		controladorArticulos.verArticulos();
	}
	
	public void editarArticulo(String nombreNuevo, double precioUnitarioNuevo, int stockNuevo, int idNuevo) {
		controladorArticulos.editarArticulo(nombreNuevo, precioUnitarioNuevo, stockNuevo, idNuevo);
	}
	
	public void eliminarArticulo(int id_articulo) {
		controladorArticulos.eliminarArticulo(id_articulo);
	}
}
