import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("SupermercadoPyton")
cursor = conexion.cursor()

def seguimiento_compra ():
    while True:
        idpedido = int(input("Introduce el id pedido:")) #Solicitamos al cliente que ingrese el id del pedido para ver todo el detalles
        #Utilizamos select para poder tener los datos del cliente y del pedido
        consulta = """SELECT 
            C.idcliente, 
            C.nombre AS nombre, 
            C.apellido AS apellido, 
            C.idproducto,
            PR.nombre AS nombre_producto, 
            D.cantidad, 
            D.precio
        FROM 
            cliente C
        JOIN 
            pedido P ON c.idcliente = P.idcliente
        JOIN 
            detalle D ON P.idpedido = D.idpedido
        JOIN 
            producto PR ON D.idproducto = PR.idproducto
        WHERE 
            P.idpedido = %s
        ORDER BY 
            P.idpedido;"""
        
        cursor.execute(consulta, (idpedido,))
        pedidos = cursor.fetchall()
        total_compra = 0
        print(f"Lista de productos del id pedido {idpedido}:")
        for pedido in pedidos:
            idcliente, nombre, apellido, idproducto, nombre_producto, cantidad, precio = pedido
            print (Fore.YELLOW+ f"[Mensaje de confirmacion] idcliente: {idcliente}/ nombre: {nombre}/ apellido: {apellido}/ idproducto: {idproducto}/ nombre del productos: {nombre_producto}/ cantidad: {cantidad} / precio producto: {precio}") #Le enseñamos al cliente los datos del pedido que ha realizado y sus datos a el
            print(Style.RESET_ALL)
            
            total_compra += precio * cantidad #Sumamos el total de la compra
            
        #Escribimos en un archivo txt cuanto cuesta un producto
        with open("total_pedido.txt", "w") as archivo:
            archivo.write(f"El total de tu compra es de: {total_compra}€")
                
        # Leemos en el archivo txt el total de un prodcuto
        with open ("total_pedido.txt", "r") as archivo:
            contenido = archivo.read()
        print(contenido)
        break