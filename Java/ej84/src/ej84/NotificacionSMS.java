package ej84;

public class NotificacionSMS implements Notificable{
	protected String numeroTelefono;
	
	public NotificacionSMS(String numeroTelefono) {
        this.numeroTelefono = numeroTelefono;
    }
	
	public void enviar(String mensaje) {
		System.out.println("El número de telefono: " + numeroTelefono + " || Te ha escrito este mensaje: " + mensaje);
	}
}
