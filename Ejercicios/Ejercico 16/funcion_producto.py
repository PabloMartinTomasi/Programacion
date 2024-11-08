import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("supermercado")
cursor = conexion.cursor()


def menu_producto():
    while True:
        try:
            print(Fore.RED+"===Gestion de Productos=== \nSeleccione una opcion: \n1. Crear nuevo producto \n2. Leer productos existentes \n3. Actualizar un producto \n4. Eliminar un producto \n5. Salir")
            print(Style.RESET_ALL)
            menu = int(input("Seleciona una opcion del Menu:"))
            if menu == 1:
                crear_producto()
            elif menu == 2:
                leer_producto()
            elif menu == 3:
                actualizar_producto()
            elif menu == 4:
                eleminar_producto()
            elif menu == 5:
                cerrar_conexion_productos()
                break
            else:
                print(Fore.YELLOW+ "Seleciona una opcion del menu")
                print(Style.RESET_ALL)
                
        except ValueError as ve:
            print(Fore.RED + f"Error: Entrada inválida. ({ve})")
            print(Style.RESET_ALL)
        except Exception as e:
            print(Fore.RED + f"Error inesperado: {str(e)}")
            print(Style.RESET_ALL)





def crear_producto():
    idproducto = int(input("Dame el id del producto:"))
    nombre = input("Dame el nombre del producto:")
    idcategoria = int(input("Dame el idcategoria de tu producto:"))
    medida = input("Dame la medida de tu producto(cantidad en cada caja):")
    precio = int(input("Dame el precio del producto:"))
    stock = int(input("Dame el stock de ese producto:"))
    nuevo_producto = (idproducto, nombre, idcategoria, medida, precio, stock)
    consulta = """INSERT INTO producto(idproducto, nombre, idcategoria, medida, precio, stock) VALUES (%s, %s, %s, %s, %s, %s)"""
    cursor.execute(consulta, nuevo_producto)
    conexion.commit()
    print(Fore.GREEN+ f"[Mensaje de confirmacion] El producto {nombre} ha sido creado con éxito.")
    print(Style.RESET_ALL)

def leer_producto():
    consulta = """SELECT idproducto, nombre, idcategoria, medida, precio, stock FROM producto"""
    cursor.execute(consulta)
    productos = cursor.fetchall()
    print(Fore.BLUE+"Listado de productos:")
    print(Style.RESET_ALL)
    for idproducto, nombre, idcategoria, medida, precio, stock in productos:
        print(Fore.BLUE + f"{idproducto} - {nombre} - {idcategoria} - {medida} - {precio} - {stock}")
        print(Style.RESET_ALL)

def actualizar_producto():
    idproducto = int(input("Ingresa el ID del producto que desees actualizar:"))
    nombre = input("Ingresa el nuevo nombre del nuevo producto:")
    idcategoria = int(input("Ingresa el ID de la categoria de tu producto que desead actualizar:"))
    medida = input("Dame la medida de tu producto que deseas catualizar(cantidad en cada caja):")
    precio = int(input("Dame el precio del producto que deseas actualizar:"))
    stock = int(input("Ingresa el stock de tu producto que estas actualizando:"))
    consulta = """UPDATE producto SET nombre = %s, idcategoria = %s, medida = %s, precio = %s, stock = %s WHERE idproducto = %s"""
    cursor.execute(consulta, (nombre, idcategoria, medida, precio, stock, idproducto))
    conexion.commit()
    print(Fore.CYAN+ f"[Mensaje de confirmación] El  producto con ID {idproducto} ha sido actualizado.")
    print(Style.RESET_ALL)

def eleminar_producto():
    idproducto = int(input("Ingrese el ID del producto a eliminar:"))
    consulta = """DELETE FROM producto WHERE idproducto = %s"""
    cursor.execute(consulta, (idproducto,))
    conexion.commit()
    print(f"[Mensaje de confirmación] La categoría con el ID {idproducto} ha sido eliminada.")
    
def cerrar_conexion_productos():
    if cursor:
        cursor.close()
    if conexion:
        conexion.close()