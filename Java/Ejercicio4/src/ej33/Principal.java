package ej33;

public class Principal {

	public static void main(String[] args) {
		CuentaBancaria cuenta1 = new CuentaBancaria();
		cuenta1.depositar(100);
		cuenta1.retirar(50);
		System.out.println(cuenta1.getSaldo());
	}

}
