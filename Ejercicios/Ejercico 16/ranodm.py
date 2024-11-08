import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("supermercado")
cursor = conexion.cursor()

    
while True:
    try:
        print(Fore.RED+"===Gestion de Productos=== \nSeleccione una opcion: \n1. Crear nuevo producto \n2. Leer productos existentes \n3. Actualizar un producto \n4. Eliminar un producto \n5. Salir")
        print(Style.RESET_ALL)
        menu = int(input("Seleciona una opcion del Menu:"))
        if menu == 1:
            idproducto = int(input("Dame el id del producto:"))
            nombre = input("Dame el nombre del producto:")
            idcategoria = int(input("Dame el idcategoria de tu producto:"))
            medida = input("Dame la medida de tu producto(cantidad en cada caja):")
            precio = int(input("Dame el precio del producto:"))
            stock = int(input("Dame el stok de ese producto:"))
            nuevo_producto = (idproducto, nombre, idcategoria, medida, precio, stock)
            consulta = """INSERT INTO categoria(idproducto, nombre, idcategoria, medida, precio, stok) VALUES (%s, %s, %s, %s, %s, %s)"""
            cursor.execute(consulta, nuevo_producto)
            conexion.commit()
            print(Fore.GREEN+ f"[Mensaje de confirmacion] El producto {nombre} ha sido creado con éxito.")
            print(Style.RESET_ALL)
                
        elif menu == 2:
            consulta = """SELECT idproducto, nombre, idcategoria, medida, precio, stock FROM producto"""
            cursor.execute(consulta)
            productos = cursor.fetchall()
            print(Fore.BLUE+"Listado de productos:")
            print(Style.RESET_ALL)
            for producto in productos:
                idproducto, nombre, idcategoria, medida, precio, stok = producto
                print(Fore.BLUE+ f"{idproducto} - {nombre} - {idcategoria} - {medida} - {precio} - {stok}")
                print(Style.RESET_ALL)
                    
        elif menu == 3:
            idproducto = int(input("Ingresa el ID del producto que desees actualizar:"))
            nombre = input("Ingresa el nuevo nombre del nuevo producto:")
            idcategoria = int(input("Ingresa el ID de la categoria de tu producto que desead actualizar:"))
            medida = input("Dame la medida de tu producto que deseas catualizar(cantidad en cada caja):")
            precio = int(input("Dame el precio del producto que deseas actualizar:"))
            stock = int(input("Ingresa el stok de tu producto que estas actualizando:"))
            consulta = """UPDATE producto SET nombre = %s, idcategoria = %s, medida = %s, precio = %s, stok = %s WHERE idproducto = %s"""
            cursor.execute(consulta, (nombre, idcategoria, medida, precio, stok, idproducto))
            conexion.commit()
            print(Fore.CYAN+ f"[Mensaje de confirmación] El  idproducto {idproducto} ha sido actualizada al nombre {nombre}, a la categoria {idcategoria}, a la medida {medida}, al precio de {precio} y al stok {stok}")
            print(Style.RESET_ALL)
            
        elif menu == 4:
            idproducto = int(input("Ingrese el ID del producto a eliminar:"))
            consulta = """DELETE FROM categoria WHERE idproducto = %s"""
            cursor.execute(consulta, (idproducto,))
            conexion.commit()
            print(f"[Mensaje de confirmación] La categoría con ID {idproducto} ha sido eliminada.")
            
        elif menu == 5: 
            print(Fore.MAGENTA+ "[Mensaje] Saliendo de la gestión de categorías. ¡Hasta pronto!")
            print(Style.RESET_ALL)
            cursor.close()
            conexion.close()
            break
            
        else:
            print(Fore.YELLOW+ "Seleciona una opcion del menu")
            print(Style.RESET_ALL)
            continue
            
    except ValueError:
        print(ValueError)
    except Exception:
        print(Exception)