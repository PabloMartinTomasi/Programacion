<?php
error_reporting(E_ALL);

class CuentaBancaria{
    public $titular;
    public $saldo;
    public $tipoDeCuenta;

    public function depositar($cantidad){
        if ($cantidad > 0) {
            $this->saldo += $cantidad;
            echo "Se a depositado corectamente {$cantidad}€, ahora tu saldo es de {$this->saldo}€. \n";
        } else{
            echo "Se debe introducir una cantidad positiva.\n";
        }
    }
    public function retirar($cantidad){
        if ($cantidad > 0 && $cantidad <= $this->saldo){
            $this->saldo -= $cantidad;
            echo "Has retirado la de {$cantidad}€, tu saldo actual es de {$this->saldo}€. \n";
        } else {
            echo "No puedes retirar esa cantidad.\n";
        }
    }
    public function mostrarInfo(){
        echo "Titular: {$this->titular}\n";
        echo "Saldo: {$this->saldo}\n";
        echo "Tipo de Cuenta: {$this->tipoDeCuenta}";
    }
}



$Cuenta = new CuentaBancaria;

$Cuenta->titular="Juan";
$Cuenta->saldo=150;
$Cuenta->tipoDeCuenta="Cuenta coriente";

$Cuenta->depositar(500); //Depositar 500
$Cuenta->depositar(-1); //Intento de depositar un saldo negativo
$Cuenta->retirar(500); //Retirar 500
$Cuenta->retirar(600); //Intento de retirar un numero mayor 
$Cuenta->mostrarInfo();

?>