import conexion_bd as bd
from colorama import Fore, Back, Style
from datetime import datetime, timedelta


conexion = bd.conectar("supermercado")
cursor = conexion.cursor()

def menu_pedido():
    while True:
        print(Fore.RED+"===Gestion de pedidos=== \nSeleccione una opcion: \n1. Crear un nuevo pedido \n2. Leer pedidos exictentes \n3. Actualizar un pedido \n4. Eliminar un pedidio \n5. Salir")
        menu = int(input("Seleciona una opcion del menu"))
        if menu == 1:
            crear_pedido()
        elif menu == 2:
            leer_pedido()
        elif menu == 3:
            actualizar_pedido()
        elif menu == 4:
            eliminar_pedido()
        elif menu == 5:
            cerrar_conexion_pedidos()
            break
        break
    
def crear_pedido():
    try:
        idpedido = int(input("Dame el idpedido de tu pedido:")) #Poner id del pedido
        idcliente = input("Dame el idcliente de tu cliente:")#Poner el id del cliente
        fechapedido = datetime.now()#Se genera una nueva fecha
        fechaentrega = fechapedido + timedelta(days=3)#Agregamos 3 dias al pedido para la entrega
            
        nuevo_pedido = (idpedido, idcliente, fechapedido, fechaentrega)
        consulta = """INSERT INTO pedido(idpedido, idcliente, fechapedido, fechaentrega) VALUES (%s, %s, %s, %s)"""
        cursor.execute(consulta, nuevo_pedido)
        #crear detalle
        idpedido = idpedido
        while True:
            idproducto = int(input(Fore.GREEN+"Introduce el id producto que deseas comprar(o -1 para acabar):")) #Le solicitamos al cliente que ingrese los id de los productos que desea comprar, y si quiere dejar de añadir productos escribe 111
            if idproducto == -1:
                break
            unidades = int(input(f"Cuantas unidades del producto {idproducto} deseas comprar:")) #El cliente tiene que poner la cantidad del producto
            if unidades <= 0:
                continue
            descuento = float(input("Introduce el descuento:"))#Hay que introducir el descuento
            print(Style.RESET_ALL)
            precio_unidad = idproducto
            precio = precio_unidad * unidades - descuento
            consulta_detalle = """INSERT INTO detalle (idpedido, idproducto, cantidad, precio) VALUES (%s, %s, %s, %s)"""
            cursor.execute(consulta_detalle, (idpedido, idproducto, unidades, precio, descuento))
        conexion.commit()
        
        print(f"[Mensaje de confirmación] El pedido {idpedido} a sido creado con exito")
            
        print(Fore.GREEN + f"[Mensaje de confirmacion] Tu pedido con el id {idpedido} ha sido hecho con éxito.")
        print(Style.RESET_ALL)
    
    except ValueError as e:
        print(Fore.RED + f"Error: {e}. Asegúrate de que los datos sean correctos.")
        print(Style.RESET_ALL)
        
def leer_pedido():
    try:
        consulta = """SELECT 
            p.idpedido, 
            p.idcliente, 
            p.fechapedido, 
            p.fechaentrega, 
            d.idproducto, 
            d.precio, 
            d.unidades, 
            d.descuento
        FROM 
            pedido p
        LEFT JOIN 
            detalle d ON p.idpedido = d.idpedido;""" #Usamos el select para leer el pedido y el detalle
        cursor.execute(consulta)
        pedidos = cursor.fetchall()

        if not pedidos:
            print(Fore.RED + "No se encontraron resultados.")
            print(Style.RESET_ALL)
        else:
            print(Fore.BLUE + "Listado de los pedidos con detalles:")
            print(Style.RESET_ALL)
        for pedido in pedidos:
            idpedido, idcliente, fechapedido, fechaentrega, idproducto, precio, unidades, descuento = pedido
            print(Fore.BLUE + f"{idpedido} - {idcliente} - {fechapedido} - {fechaentrega} - {idproducto} - {precio} - {unidades} - {descuento}")
            print(Style.RESET_ALL)
        cursor.close()
        conexion.close()
    
    except Exception as e:
        print(Fore.RED + f"Error al conectar o ejecutar la consulta: {str(e)}")
        print(Style.RESET_ALL)
            
def actualizar_pedido():
    try:
        idpedido = int(input("Introduce el idpedido que deseas actualizar:"))
        fechapedido = datetime.now()
        fechaentrega = fechapedido + timedelta(days=3)
        consulta_actualizar = """UPDATE pedido SET fechapedido = %s, fechaentrega = %s WHERE idpedido = %s""" #Actualizamos el pedido
        cursor.execute(consulta_actualizar, (idpedido, fechapedido, fechaentrega))
        
        while True:
            idproducto = int(input(Fore.GREEN+"Introduce el id producto que deseas comprar(o -1 para acabar):")) 
            if idproducto == -1:
                break
            unidades = int(input(f"Cuantas unidades del producto {idproducto} deseas comprar:"))
            if unidades <= 0:
                continue
            descuento = float(input("Introduce el descuento:"))
            print(Style.RESET_ALL)
            precio_unidad = idproducto
            precio = precio_unidad * unidades - descuento
            consulta_detalle = """UPDATE detalle SET idproducto = %s, precio = %s, unidades = %s, descuento = %s WHERE idpedido = %s""" #Actualizamos los productos que han ingresado
            cursor.execute(consulta_detalle, (idpedido, idproducto, unidades, precio, descuento))
        conexion.commit()
        print(Fore.CYAN+ f"[Mensaje de confirmación] El idpedido ha sido actualizado con exito {idpedido}.")
        print(Style.RESET_ALL)
        
    except Exception as e:
        print(Fore.RED + f"Error al conectar o ejecutar la consulta: {str(e)}")
        print(Style.RESET_ALL)
            
def eliminar_pedido():
    try:
        while True:
            eliminar = int(input("Deseas eliminar el pedido o una categoria (1 o 2)"))
            if eliminar == 1:
                idpedido = int(input("Intricude el idpedido para poder eliminar el pedido por completo:"))
                consulta_eliminar_pedido = """DELETE FROM pedido WHERE idpedido = %s"""
                cursor.execute(consulta_eliminar_pedido, (idpedido,))
                conexion.commit()
                break
            
            elif eliminar == 2:
                idpedido = int(input("Introduce el idpedido para poder eliminar el producto:"))
                idproducto = int(input("Introduce el idproducto para eliminarlo de tu pedido:"))
                consulta_eliminar_prodcuto = """DELETE FROM detalle WHERE idpedido = %s AND idproducto = %s"""
                cursor.execute(consulta_eliminar_prodcuto, (idpedido, idproducto))
                conexion.commit()
                break
            
            else:
                print("Seleciona una opcion del menu")
        
        
    except Exception as e:
        print(Fore.RED + f"Error al conectar o ejecutar la consulta: {str(e)}")
        print(Style.RESET_ALL)
        
def cerrar_conexion_pedidos():
    if cursor:
        cursor.close()
    if conexion:
        conexion.close()