import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("supermercado")
cursor = conexion.cursor()

def categorias():
    while True:
        try:
            print(Fore.RED+"===Gestion de Categorias=== \nSeleccione una opcion: \n1. Crear nueva categoria \n2. Leer categorias existentes \n3. Actualizar una categoria \n4. Eliminar una categoria \n5. Salir")
            print(Style.RESET_ALL)
            menu = int(input("Seleciona una opcion del Menu:"))
            if menu == 1: #Si usuario seleciona opcion 1
                idcategoria = int(input("Dame el idcategoria de tu producto:"))
                categoria = input("Dame la categoria de tu producto:")
                nueva_categoria = (idcategoria, categoria) #idcategoria, categoria
                consulta = """INSERT INTO categoria(idcategoria, categoria) VALUES (%s, %s)"""
                cursor.execute(consulta, nueva_categoria)
                conexion.commit()
                print(Fore.GREEN+ f"[Mensaje de confirmacion] La categoria {categoria} ha sido creada con éxito.")
                print(Style.RESET_ALL)


            elif menu == 2: #Si usuario seleciona opcion 2
                consulta = """SELECT idcategoria, categoria FROM categoria"""
                cursor.execute(consulta)
                categorias = cursor.fetchall()
                print(Fore.BLUE+"Listado de Categorias:")
                print(Style.RESET_ALL)
                for categoria in categorias:
                    idcategoria, nombre_categoria = categoria
                    print(Fore.BLUE+ f"{idcategoria} - {nombre_categoria}")
                    print(Style.RESET_ALL)


            elif menu == 3: #Si usuario seleciona opcion 3
                idcategoriaa = int(input("Ingresa el ID de la categoria a actualizar:"))
                categoriaa = input("Ingresa el nuevo nombre de la categoria:")
                consulta = """UPDATE categoria SET categoria = %s WHERE idcategoria = %s"""
                cursor.execute(consulta, (categoriaa, idcategoriaa))
                conexion.commit()
                print(Fore.CYAN+ f"[Mensaje de confirmación] La categoría con ID {idcategoriaa} ha sido actualizada a {categoriaa}")
                print(Style.RESET_ALL)


            elif menu == 4: #Si usuario seleciona opcion 4
                idCategoriaa = int(input("Ingrese el ID de la categoria a eliminar:"))
                consulta = """DELETE FROM categoria WHERE idcategoria = %s"""
                cursor.execute(consulta, (idCategoriaa,))
                conexion.commit()
                print(f"[Mensaje de confirmación] La categoría con ID {idCategoriaa} ha sido eliminada.")


            elif menu == 5: #Si usuario seleciona opcion 5
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
            
def producto():
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
                medida = int(input("Dame la medida de tu producto que deseas catualizar(cantidad en cada caja):"))
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