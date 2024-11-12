import conexion_bd as bd
import numpy as np
from colorama import Fore, Back, Style


conexion = bd.conectar("SupermercadoPyton")
cursor = conexion.cursor()

def realizar_compra ():
    while True:
        consulta = """SELECT idproducto, nombre, medida, precio, stock FROM producto""" #Le enseñamos al usuario la lista de productos que hay en la tienda
        cursor.execute(consulta)
        productos = cursor.fetchall()
        print(Fore.BLUE+"Listado de productos:")
        print(Style.RESET_ALL)
        for producto in productos:
            idproducto, nombre, medida, precio, stock = producto
            print(Fore.BLUE+ f"{idproducto} - {nombre} - {medida} - {precio} - {stock}")
            print(Style.RESET_ALL)
        
        idcliente = int(input("Introsuce tu id cliente:")) #Solicitamos al cliente su id
        fecha = input("Introduce la fecha actual:") #Solicitamos al cliente la fecha actual
        consulta_pedido = """INSERT INTO pedido (idcliente, fecha) VALUES (%s, %s)""" #Insertamos a la lista pedido los datos que hemos solicitado al cliente 
        cursor.execute(consulta_pedido, (idcliente, fecha))
        idpedido = cursor.lastrowid #Le generamos al cliente su nuevo idpedido
        consulta_detalle = """INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (%s, %s, %s, %s)"""
        for producto in productos:
            idproducto = int(input(Fore.GREEN+"Introduce el id producto que deseas comprar(o 111 para acabar):")) #Le solicitamos al cliente que ingrese los id de los productos que desea comprar, y si quiere dejar de añadir productos escribe 111
            if idproducto == 111:
                break
            cantidad = int(input(f"Cuanta cantidad del producto: {idproducto} deseas comprar:")) #Solicitamos al cliente que ponga la cantidad de productos que quiera
            if cantidad <= 0:
                continue
            print(Style.RESET_ALL)
            consulta_precio = """SELECT precio FROM producto WHERE idproducto = %s""" #Encontramos el precio total de cada  producto mas la cantidad que ha elegido
            cursor.execute(consulta_precio, (idproducto,))
            precio_unidad = cursor.fetchone()[0]
            total = precio_unidad * cantidad
            cursor.execute(consulta_detalle, (idpedido, idproducto, cantidad, total))
        conexion.commit()
        print (Fore.YELLOW+ f"[Mensaje de confirmacion] Tu id pedido es {idpedido}.") #Le damos el id del pedido al cliente
        print(Style.RESET_ALL)
        
        if cursor:
            cursor.close()
        if conexion:
            conexion.close()
        break