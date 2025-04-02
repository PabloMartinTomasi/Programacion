package ej84;
import java.util.LinkedList;

public class Principal {

	public static void main(String[] args) {
		LinkedList<Notificable > notificaciones = new LinkedList<>();
		
		notificaciones.add(new NotificacionEmail("juan@ejemplo.com"));
        notificaciones.add(new NotificacionEmail("luis@ejemplo.com"));
        notificaciones.add(new NotificacionEmail("fernando@ejemplo.com"));
        
        notificaciones.add(new NotificacionSMS("123456789"));
        notificaciones.add(new NotificacionSMS("123456799"));
        notificaciones.add(new NotificacionSMS("123456999"));
		
        String mensajeGenerico = "Este es un mesanje";

        for (Notificable notificacion : notificaciones) {
            notificacion.enviar(mensajeGenerico);
        }

	}

}
