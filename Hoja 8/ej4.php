<?php
error_reporting(E_ALL);

class Carrito{
    public $productos=[];

    public function agregarProducto($nombre, $precio, $cantidad){
        foreach ($this->productos as & $produto){
            if ($produto["nombre"] === $nombre){
                $produto["cantidad"] += $cantidad;
                return;
            }
        }

        $this->productos[] = [
            "nombre" => $nombre,
            "precio" => $precio,
            "cantidad" => $cantidad
        ];
    }
    public function quitarProducto($nombre){
        foreach ($this->productos as $index => $produto){
            if ($produto ["nombre"] == $nombre){
                unset($this->productos[$index]);
                echo "El producto {$nombre}, ha sido elminado con exito del carrito.\n\n";
                return;
            }
        }
        echo "El producto {$nombre}, no ha sido encontrado en el carrito.\n";
    }
    public function calcularTotal(){
        $total=0;
        foreach ($this->productos as $produto) {
            $total += $produto["precio"]*$produto["cantidad"];
        }
        return $total;
    }
    public function mostrarDetalleCarrito(){
        if (empty($this->productos)){
            echo "El carrito esta vacío.\n";
            return;
        }
        echo "Lo que hay en tu carrito:\n";
        foreach ($this->productos as $producto){
            echo "{$producto["nombre"]} (Precio: {$producto["precio"]} | Cantidad: {$producto["cantidad"]})\n\n";
        }
    }
}



$carrito = new Carrito();

$carrito->agregarProducto("Manzanas", 7, 5);
$carrito->agregarProducto("Platanos", 8, 7);
$carrito->agregarProducto("Aguacates", 4, 3);


$carrito->mostrarDetalleCarrito();


$total = $carrito->calcularTotal();
echo "Aqui esta el total del carrito: $total\n";


$carrito->quitarProducto("Platanos");


$carrito->mostrarDetalleCarrito();


$total = $carrito->calcularTotal();
echo "Total del carrito después de quitar los aguacates: $total\n";




?>