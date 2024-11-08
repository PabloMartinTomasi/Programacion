import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("supermercado")
cursor = conexion.cursor()


def menu_categorias():
    while True:
        try:
            print(Fore.RED+"===Gestion de Categorias=== \nSeleccione una opcion: \n1. Crear nueva categoria \n2. Leer categorias existentes \n3. Actualizar una categoria \n4. Eliminar una categoria \n5. Salir")
            print(Style.RESET_ALL)
            menu = int(input("Seleciona una opcion del Menu:"))
            if menu == 1:
                crear_categoria()
            elif menu == 2:
                leer_categoria()
            elif menu == 3:
                actualizar_categoria()
            elif menu == 4:
                eliminar_categoria()
            elif menu == 5:
                cerrar_conexion_categorias()
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
            




def crear_categoria():
    idcategoria = int(input("Dame el idcategoria de tu producto:"))
    categoria = input("Dame la categoria de tu producto:")
    nueva_categoria = (idcategoria, categoria) 
    consulta = """INSERT INTO categoria(idcategoria, categoria) VALUES (%s, %s)"""
    cursor.execute(consulta, nueva_categoria)
    conexion.commit()
    print(Fore.GREEN+ f"[Mensaje de confirmacion] La categoria {categoria} ha sido creada con éxito.")
    print(Style.RESET_ALL)
    
def leer_categoria():
    consulta = """SELECT idcategoria, categoria FROM categoria"""
    cursor.execute(consulta)
    categorias = cursor.fetchall()
    print(Fore.BLUE+"Listado de Categorias:")
    print(Style.RESET_ALL)
    for categoria in categorias:
        idcategoria, nombre_categoria = categoria
        print(Fore.BLUE+ f"{idcategoria} - {nombre_categoria}")
        print(Style.RESET_ALL)
        
def actualizar_categoria():
    idcategoriaa = int(input("Ingresa el ID de la categoria a actualizar:"))
    categoriaa = input("Ingresa el nuevo nombre de la categoria:")
    consulta = """UPDATE categoria SET categoria = %s WHERE idcategoria = %s"""
    cursor.execute(consulta, (categoriaa, idcategoriaa))
    conexion.commit()
    print(Fore.CYAN+ f"[Mensaje de confirmación] La categoría con ID {idcategoriaa} ha sido actualizada a {categoriaa}")
    print(Style.RESET_ALL)
    
def eliminar_categoria():
    idCategoriaa = int(input("Ingrese el ID de la categoria a eliminar:"))
    consulta = """DELETE FROM categoria WHERE idcategoria = %s"""
    cursor.execute(consulta, (idCategoriaa,))
    conexion.commit()
    print(f"[Mensaje de confirmación] La categoría con ID {idCategoriaa} ha sido eliminada.")
    
def cerrar_conexion_categorias():
    if cursor:
        cursor.close()
    if conexion:
        conexion.close()