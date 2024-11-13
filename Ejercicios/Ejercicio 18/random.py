import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("SUPERMERCADO")
cursor = conexion.cursor()

try:
    idpedido = int(input("Introduce el idpedido que quieres actualizar:"))
    idcliente = input("Dame el idcliente de tu cliente: ")
    
    consulta = """UPDATE pedido SET idcliente = %s, fechapedido=%s, fechaentrega = %s WHERE idpedido = %s"""
    cursor.execute(consulta, (idpedido, idcliente))
    conexion.commit()
    
    consultaProducto = """SELECT idproducto, nombre, idcategoria, medida, precio, stock FROM producto"""
    cursor.execute(consultaProducto)
    productos = cursor.fetchall()
    print(Fore.BLUE+"Listado de productos:")
    print(Style.RESET_ALL)
    for idproducto, nombre, idcategoria, medida, precio, stock  in productos:
        i
        print(Fore.BLUE + f"{idproducto} - {nombre} - {idcategoria} - {medida} - {precio} - {stock}")
        print(Style.RESET_ALL)
    
    producto = int(input("Que id producto deseas actualizar:"))
    consultaDetalle = """UPDATE detalle SET idproducto = %s, precio = %s, unidades = %s, descuento = %s WHERE idpedido = %s"""
    cursor.execute(consultaDetalle, (producto))
    conexion.commit()

    print(Fore.CYAN+ f"[Mensaje de confirmación] El pedido con ID {idpedido} ha sido actualizado")
    print(Style.RESET_ALL)
    
except Exception as e:
    print(Fore.RED + f"Error al conectar o ejecutar la consulta: {str(e)}")
    print(Style.RESET_ALL)
finally:
    if conexion:
        conexion.close()