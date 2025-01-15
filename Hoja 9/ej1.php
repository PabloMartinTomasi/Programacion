<?php

class Producto{
    private $nombre;
    private $precio;
    private $cantidad;

    public function __construct($nombre, $precio, $cantidad)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad =$cantidad;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function mostrardetalle(){
        echo "Nombre del producto: {$this->nombre}\n";
        echo "Precio del producto: {$this->precio}€\n";
        echo "Cantidad: {$this->cantidad}\n\n";
    }
}


class ProductoImportado extends Producto{
    private $impuestoAdicional;

    public function __construct($nombre, $precio, $cantidad, $impuestoAdicional){
        parent::__construct($nombre, $precio, $cantidad);
        $this->impuestoAdicional = $impuestoAdicional;
    }

    public function calcularPrecioFinal(){
        $precioFinal = $this->getPrecio() + ($this->getPrecio() * $this->impuestoAdicional / 100);
        return $precioFinal;
    }

    public function mostrardetalle(){
        parent::mostrardetalle();
        echo "Impuesto adicional: {$this->impuestoAdicional}%\n";
        echo "Precio final con el impuesto incluido: {$this->calcularPrecioFinal()}€\n";
    }
}




$producto = new Producto("Camiseta", 20, 5);
$productoImportado = new ProductoImportado("Reloj de Pulsera", 100, 2, 15);


echo "PRODUCTO:\n";
$producto->mostrardetalle();

echo "PRODUCTO IMPORTADO:";
$productoImportado->mostrardetalle();


?>