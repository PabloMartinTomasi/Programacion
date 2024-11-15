import conexion_bd as bd
import numpy as np
from colorama import Fore, Back, Style


conexion = bd.conectar("SupermercadoPyton")
cursor = conexion.cursor()

def seguimiento_compra ():
    while True:
        idpedido = int(input("Introduce el id pedido:")) #Solicitamos al cliente que ingrese el id del pedido para ver todo el detalles
        #Utilizamos select para poder tener los datos del cliente y del pedido
        consulta = """SELECT 
            c.idcliente, 
            c.nombre AS nombre, 
            c.apellido AS apellido, 
            d.idproducto,
            pr.nombre AS nombre_producto, 
            d.cantidad, 
            d.precio
        FROM 
            cliente c
        JOIN 
            pedido p ON c.idcliente = p.idcliente
        JOIN 
            detalle d ON p.idpedido = d.idpedido
        JOIN 
            producto pr ON d.idproducto = pr.idproducto
        WHERE 
            p.idpedido = %s
        ORDER BY 
            p.idpedido;"""
        
        cursor.execute(consulta, (idpedido,))
        pedidos = cursor.fetchall()
        print(f"Lista de productos del id pedido {idpedido}:")
        for pedido in pedidos:
            idcliente, nombre, apellido, idproducto, nombre_producto, cantidad, precio = pedido
            print (Fore.YELLOW+ f"[Mensaje de confirmacion] {idcliente} - {nombre} - {apellido} - {idproducto} - {nombre_producto} - {cantidad} - {precio}") #Le enseñamos al cliente los datos del pedido que ha realizado y sus datos a el
            print(Style.RESET_ALL)
        break