package ej66;

public class Principal {

	public static void main(String[] args) {
		Notificable correoElectronico = new CorreoElectronico();
		Notificable mensajeTexto = new MensajeTexto();
		
		correoElectronico.enviarNotificacion();
		mensajeTexto.enviarNotificacion();
	}

}
