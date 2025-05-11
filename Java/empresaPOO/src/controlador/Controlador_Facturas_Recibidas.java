package controlador;
import modelo.Modelo_Facturas_Recibidas;
import java.sql.*;

public class Controlador_Facturas_Recibidas {
	Modelo_Facturas_Recibidas controladorFacturasRecibidas = new Modelo_Facturas_Recibidas();

    public void agregarFactura(int idProveedor, String fecha, double total) {
    	controladorFacturasRecibidas.agregarFactura(idProveedor, fecha, total);
    }

    public void verFacturas() {
    	controladorFacturasRecibidas.verFacturas();
    }

    public void modificarFactura(int nuevoIdProveedor, String nuevaFecha, double nuevoTotal, int idFactura) {
    	controladorFacturasRecibidas.modificarFactura(nuevoIdProveedor, nuevaFecha, nuevoTotal, idFactura);
    }

    public void eliminarFactura(int idFactura) {
    	controladorFacturasRecibidas.eliminarFactura(idFactura);
    }
}
