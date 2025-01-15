<?php

class CuentaBancaria{
    private $titular;
    private $saldo;
    private $tipoCuenta;

    public function __construct($titular, $saldo, $tipoCuenta)
    {
        $this->titular = $titular;
        $this->saldo = $saldo;
        $this->tipoCuenta = $tipoCuenta;
    }

    public function depositar($cantidad){
        if ($cantidad > 0){
            $this->saldo += $cantidad;
        }
        else{
            echo "No se puede depositar una cantidad negativa.\n";
        }
    }

    public function retirar($cantidad){
        if ($this->verificarSaldoSuficiente($cantidad)){
            $this->saldo -= $cantidad;
        }
        else{
            echo "No puedes retirar esa cantidad.\n\n";
        }
    }

    private function verificarSaldoSuficiente($cantidad){
        return $cantidad < $this->saldo;
    }

    public function mostrarDetalles(){
        echo "Titular: {$this->titular} | Saldo: {$this->saldo} | Tipo de cuenta: {$this->tipoCuenta}\n";
    }
}

$cuentabancaria = new CuentaBancaria("Juan", 0, "Cuenta coriente");

$cuentabancaria->depositar(150);
$cuentabancaria->retirar(50);

$cuentabancaria->mostrarDetalles();

$cuentabancaria->depositar(-1);
$cuentabancaria->retirar(200);

$cuentabancaria->mostrarDetalles();

?>