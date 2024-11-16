import conexion_bd as bd
from datetime import datetime
from colorama import Fore, Back, Style


conexion = bd.conectar("SupermercadoPyton")
cursor = conexion.cursor()

def realizar_compra():
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
        
        idcliente = int(input("Introduce tu id cliente:")) #Solicitamos al cliente su id
        fecha = datetime.now() #Ponemos la fecha en el que se esta haciendo el pedido
        consulta_pedido = """INSERT INTO pedido (idcliente, fecha) VALUES (%s, %s)""" #Insertamos a la lista pedido los datos que hemos solicitado al cliente 
        cursor.execute(consulta_pedido, (idcliente, fecha))
        idpedido = cursor.lastrowid #Le generamos al cliente su nuevo idpedido
        while True:
            idproducto = int(input(Fore.GREEN+"Introduce el id producto que deseas comprar(o -1 para acabar):")) #Le solicitamos al cliente que ingrese los id de los productos que desea comprar, y si quiere dejar de añadir productos escribe 111
            if idproducto == -1:
                break

            cantidad = int(input(f"Cuanta cantidad del producto {idproducto} deseas comprar:")) #Solicitamos al cliente que ponga la cantidad de productos que quiera
            if cantidad <= 0:
                continue
            print(Style.RESET_ALL)
            
            precio_unidad = idproducto
            precio = precio_unidad * cantidad
            consulta_detalle = """INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (%s, %s, %s, %s)"""
            cursor.execute(consulta_detalle, (idpedido, idproducto, cantidad, precio))
        conexion.commit()
        print (Fore.YELLOW+ f"[Mensaje de confirmacion] Tu id pedido es {idpedido}.") #Le damos el id del pedido al cliente
        print(Style.RESET_ALL)

        break