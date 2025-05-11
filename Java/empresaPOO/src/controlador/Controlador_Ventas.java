package controlador;
import modelo.Modelo_Ventas;
import java.sql.*;

public class Controlador_Ventas {
    Modelo_Ventas controladorVentas = new Modelo_Ventas();

    public void agregarVenta(int idCliente, int idArticulo, int cantidad, String fechaVenta) {
        controladorVentas.agregarVenta(idCliente, idArticulo, cantidad, fechaVenta);
    }

    public void verVentas() {
        controladorVentas.verVentas();
    }

    public void modificarVenta(int idVenta, int nuevoIdCliente, int nuevoIdArticulo, int nuevaCantidad, String nuevaFecha) {
        controladorVentas.modificarVenta(idVenta, nuevoIdCliente, nuevoIdArticulo, nuevaCantidad, nuevaFecha);
    }

    public void eliminarVenta(int idVenta) {
        controladorVentas.eliminarVenta(idVenta);
    }
}

