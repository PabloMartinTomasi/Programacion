package ej84;

public class NotificacionEmail implements Notificable{
	protected String direccionCorreo;
	
	public NotificacionEmail(String direccionCorreo) {
        this.direccionCorreo = direccionCorreo;
    }
	
	public void enviar(String mensaje) {
		System.out.println("El coreo electronico: " + direccionCorreo + " || Te ha escrito este mail: " + mensaje);
	}
}
