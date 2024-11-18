import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("Centro_Deportivo")
cursor = conexion.cursor()

def menu_entrenadores():
    try:
        while True:
            print(Fore.RED+ "===Gestión de Entrenadores=== \n1- Crear un nuevo entrenador \n2- Leer la lista de entrenadores \n3- Actualizar información de un entrenador \n4- Eliminar un entrenador \n5- Salir")
            menu = int(input("Elige una opcion del menu:"))
            print(Style.RESET_ALL)
            if menu == 1:
                crear_entrenador()
                
            elif menu == 2:
                leer_entrenador()
                
            elif menu == 3:
                actualizar_entrenador()
                
            elif menu == 4:
                eliminar_entrenador()
                
            elif menu == 5:
                salir_menu_entrenadores()
                break
            
            else:
                print("Seleciona una opcion del menu") 
        
    except ValueError as ve:
        print(Fore.RED + f"Error: Entrada inválida. ({ve})")
        print(Style.RESET_ALL)
    except Exception as e:
        print(Fore.RED + f"Error inesperado: {str(e)}")
        print(Style.RESET_ALL)
        
def crear_entrenador():
    nombre_entrenador = input("Ingresa el nombre del entrenador:")
    especialidad = input("Ingresa la especialidad del entrenador:")
    
    nuevo_entrenador = (nombre_entrenador, especialidad)
    consulta_entrenador = """INSERT INTO entrenadores (nombre_entrenador, especialidad) VALUES (%s, %s)"""
    cursor.execute(consulta_entrenador, nuevo_entrenador)
    conexion.commit()
    id_entrenador = cursor.lastrowid
    print(Fore.GREEN+ f"[Mensaje]: El entrenador a sido registrado exitosamente. Con el id {id_entrenador}")
    print(Style.RESET_ALL)
    
def leer_entrenador():
    consulta_entrenador = """SELECT id_entrenador, nombre_entrenador, especialidad FROM entrenadores"""
    cursor.execute(consulta_entrenador)
    entrenadores = cursor.fetchall()
    print(Fore.YELLOW+"Listado de actividaes: \IdEntrenador | Nombre | Especialidad")
    print(Style.RESET_ALL)
    for id_entrenador, nombre_entrenador, especialidad in entrenadores:
        print(f"[Mensaje]: {id_entrenador} | {nombre_entrenador} | {especialidad}")
        print(Style.RESET_ALL)
        
def actualizar_entrenador():
    id_entrenador = int(input("Ingresa el id del entrenador que hay que actualizar:"))
    nombre_entrenador = input("Ingresa el nombre del entrenador que hay que actualizar:")
    especialidad = input("Ingresa la especialidad del entrenador que hay que actualizar:")
    
    actualizar_entrenador = (nombre_entrenador, especialidad, id_entrenador)
    consulta_actualizar = """UPDATE actividades SET nombre_entrenador = %s, especialidad = %s WHERE id_entrenador = %s"""
    cursor.execute(consulta_actualizar, (actualizar_entrenador))
    conexion.commit()
    
    print(Fore.BLUE+ f"[Mensaje de confirmación] Los datos del entrenador {nombre_entrenador} ha sido actualizado.")
    print(Style.RESET_ALL)
    
def eliminar_entrenador():
    id_entrenador = int(input("Introduce el id de la actividad que deseas eliminar:"))
    consulta_eliminar = """DELETE FROM entrenadores WHERE id_entrenador = %s"""
    cursor.execute(consulta_eliminar, (id_entrenador,))
    conexion.commit()
    print(Fore.RED+ f"[Mensaje de confirmación] El entrenador con el identrenador {id_entrenador} ha sido eliminado.")
    print(Style.RESET_ALL)

def salir_menu_entrenadores():
    if cursor:
        cursor.close()
    if conexion:
        conexion.close()