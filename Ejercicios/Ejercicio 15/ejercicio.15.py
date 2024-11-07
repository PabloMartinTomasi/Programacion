import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("supermercado")
cursor = conexion.cursor()


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
