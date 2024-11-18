import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("Centro_Deportivo")
cursor = conexion.cursor()

def menu_actividades():
    try:
        while True:
            print(Fore.RED+ "===Gestión de Actividades=== \n1- Crear una nueva actividad \n2- Leer la lista de actividades \n3- Actualizar datos de una actividad \n4- Eliminar una actividad \n5- Salir")
            menu = int(input("Elige una opcion del menu:"))
            print(Style.RESET_ALL)
            if menu == 1:
                crear_actividad()
                
            elif menu == 2:
                leer_actividad()
                
            elif menu == 3:
                actualizar_actividad()
                
            elif menu == 4:
                eliminar_actividad()
                
            elif menu == 5:
                salir_menu_actividad()
                break
            
            else:
                print("Seleciona una opcion del menu")
            
    except ValueError as ve:
        print(Fore.RED + f"Error: Entrada inválida. ({ve})")
        print(Style.RESET_ALL)
    except Exception as e:
        print(Fore.RED + f"Error inesperado: {str(e)}")
        print(Style.RESET_ALL)
        
def crear_actividad():
    nombre_actividad = input("Ingrese el nombre de la actividad:")
    horario = input("Ingrese el horario:")
    duracion = int(input("Ingrese la duración (minutos):"))
    id_entrenador = int(input("Ingrese el id del entrenador:"))
    
    nueva_actividad = (nombre_actividad, horario, duracion, id_entrenador)
    consulta_actividad = """INSERT INTO actividades (nombre_actividad, horario, duracion, id_entrenador) VALUES (%s, %s, %s, %s)"""
    cursor.execute(consulta_actividad, nueva_actividad)
    conexion.commit()
    id_actividad = cursor.lastrowid
    print(Fore.GREEN+ f"[Mensaje]: Actividad registrada exitosamente. Con el id {id_actividad}")
    print(Style.RESET_ALL)
    
def leer_actividad():
    consulta_leer = """SELECT id_actividad, nombre_actividad, horario, duracion, id_entrenador FROM actividades"""
    cursor.execute(consulta_leer)
    actividades = cursor.fetchall()
    
    consulta_leer_entrenador = """SELECT id_entrenador, nombre_entrenador, especialidad FROM entrenadores"""
    cursor.execute(consulta_leer_entrenador)
    entrenadores = cursor.fetchall()
    
    print(Fore.YELLOW+"Listado de actividades: id_actividad | nombre_actividad | horario | duracion | id_entrenador | nombre_entrenador | especialidad")
    print(Style.RESET_ALL)
    for id_actividad, nombre_actividad, horario, duracion, id_entrenador in actividades:
        print(f"[Mensaje]: {id_actividad} | {nombre_actividad} | {horario} | {duracion} | {id_entrenador}")
        print(Style.RESET_ALL)
        
    print(Fore.YELLOW+"Listado datos de entrenadores: id_entrenador | nombre_entrenador | especialidad")
    print(Style.RESET_ALL)
    for id_entrenador, nombre_entrenador, especialidad in entrenadores:
        print(f"[Mensaje]: {id_entrenador} | {nombre_entrenador} | {especialidad}")
        print(Style.RESET_ALL)
        
def actualizar_actividad():
    id_actividad = int(input("Introduce el id de la actividad que quieres actualizar:"))
    nombre_actividad = input("Ingrese el nombre de la actividad que quieres actualizar:")
    horario = input("Ingrese el horario que tienes que actualizar:")
    duracion = int("Ingrese la duración que tienes que actualizar(minutos):")
    id_entrenador = int(input("Ingrese el id del entrenador que va a dar la actividad:"))
    
    actualizar_actividad = (id_actividad, nombre_actividad, horario, duracion, id_entrenador)
    consulta_actualizar = """UPDATE actividades SET nombre_actividad = %s, horario = %s, duracion = %s, id_entrenador = %s WHERE id_actividad = %s"""
    cursor.execute(consulta_actualizar, (actualizar_actividad))
    conexion.commit()
    
    print(Fore.BLUE+ f"[Mensaje de confirmación] La actividad con el ID {id_actividad} ha sido actualizado.")
    print(Style.RESET_ALL)
    
def eliminar_actividad():
    id_actividad = int(input("Introduce el id de la actividad que deseas eliminar:"))
    
    consulta_eliminar = """DELETE FROM actividades WHERE id_actividad = %s"""
    cursor.execute(consulta_eliminar, (id_actividad,))
    
    consulta_eliminar_cliente_actividad = """DELETE FROM inscripciones WHERE id_actividad = %s"""
    cursor.execute(consulta_eliminar_cliente_actividad, (id_actividad,))
    
    conexion.commit()
    print(Fore.RED+ f"[Mensaje de confirmación] La actividad con el idactividad {id_actividad} ha sido eliminado.")
    print(Style.RESET_ALL)

def salir_menu_actividad():
    if cursor:
        cursor.close()
    if conexion:
        conexion.close()