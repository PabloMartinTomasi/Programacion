import conexion_bd as bd
from colorama import Fore, Back, Style
from datetime import datetime, timedelta


conexion = bd.conectar("supermercado")
cursor = conexion.cursor()

def menu_pedido():
    while True:
        print(Fore.RED+"===Gestion de pedidos=== \nSeleccione una opcion: \n1. Crear un nuevo pedido \n2. Leer pedidos exictentes \n3. Actualizar un pedido \n4. Eliminar un pedidio \n5. Salir")
        menu = int(input("Seleciona una opcion del menu"))
        break
    
def crear_pedido():
    try:
        idpedido = int(input("Dame el idpedido de tu pedido: "))
        idcliente = input("Dame el idcliente de tu cliente: ")
        fechapedido = datetime.now()
        fechaentrega = fechapedido + timedelta(days=3)
            
        nuevo_pedido = (idpedido, idcliente, fechapedido, fechaentrega)
        consulta = """INSERT INTO pedido(idpedido, idcliente, fechapedido, fechaentrega) VALUES (%s, %s, %s, %s)"""
            
        cursor.execute(consulta, nuevo_pedido)
        conexion.commit()
            
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
            detalle d ON p.idpedido = d.idpedido;"""
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
    finally:
        if conexion:
            conexion.close()