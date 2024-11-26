from administrador import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("Centro_Deportivo")
cursor = conexion.cursor()

def menu_actividades():
    try:
        while True:
            print(Fore.RED+ "===Gestión de Actividades=== \n1- Crear una nueva actividad \n2- Leer la lista de actividades \n3- Actualizar datos de una actividad \n4- Eliminar una actividad \n5- Salir")
            menu = int(input("Elige una opcion del menu:"))
            print(Style.RESET_ALL)
            if menu == 1:#Crear una nueva actividad si se selciona la opcion 1
                crear_actividad()
            elif menu == 2:#Leer las actividades deisponibles si se selciona la opcion 2
                leer_actividad()
            elif menu == 3:#Actualizar las actividades si se selciona la opcion 3
                actualizar_actividad()
            elif menu == 4:#Eliminar una actividad si se seleciona la opcion 4
                eliminar_actividad()
            elif menu == 5:#Salir del menu de actividades si se seleciona la opcion 5
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
    nombre_actividad = input("Ingrese el nombre de la actividad:")#Solicitar que se selecione el nombre de la actividad
    horario = input("Ingrese el horario:")#Pedimos que se ponga el horario día y hora
    duracion = int(input("Ingrese la duración (minutos):"))#Pedimos que se ponga cuantos dura la actividad
    id_entrenador = int(input("Ingrese el id del entrenador:"))#Pedimos que se ponga el id del entrenado
    
    nueva_actividad = (nombre_actividad, horario, duracion, id_entrenador)
    consulta_actividad = """INSERT INTO actividades (nombre_actividad, horario, duracion, id_entrenador) VALUES (%s, %s, %s, %s)"""#Hacemos el insert into para ponerlos en la basse de datos
    cursor.execute(consulta_actividad, nueva_actividad)
    conexion.commit()
    id_actividad = cursor.lastrowid
    print(Fore.GREEN+ f"[Mensaje]: Actividad registrada exitosamente. Con el id {id_actividad}")#Imprimimos el id de la actividad
    print(Style.RESET_ALL)
    
    consulta_leer = """SELECT A.id_actividad, A.nombre_actividad, A.horario, A.duracion, E.id_entrenador, E.nombre_entrenador, E.especialidad 
                    FROM actividades A
                    INNER JOIN entrenadores E
                    ON 
                    A.id_entrenador = E.id_entrenador"""
    cursor.execute(consulta_leer)
    actividades = cursor.fetchall()
    with open("actividades.txt", "w") as archivo:
        archivo.write(f"{actividades}")

    
def leer_actividad():
    consulta_leer = """SELECT A.id_actividad, A.nombre_actividad, A.horario, A.duracion, E.id_entrenador, E.nombre_entrenador, E.especialidad 
                    FROM actividades A
                    INNER JOIN entrenadores E
                    ON 
                    A.id_entrenador = E.id_entrenador"""#Usamos la consulta para leer los datos de la actividad y del entrenedaro que hace dicha actividad
    cursor.execute(consulta_leer)
    actividades = cursor.fetchall()
    

    print(Fore.YELLOW+"Listado de actividades: id_actividad | nombre_actividad | horario | duracion | id_entrenador | nombre_entrenador | especialidad")
    print(Style.RESET_ALL)
    for id_actividad, nombre_actividad, horario, duracion, id_entrenador, nombre_entrenador, especialidad in actividades:
        print(f"[Mensaje]: {id_actividad} | {nombre_actividad} | {horario} | {duracion} | {id_entrenador} | {nombre_entrenador} | {especialidad}")#Imprimimos los datos del select
        print(Style.RESET_ALL)
    
    with open("actividades.txt", "w") as archivo:
        archivo.write(f"{actividades}")

def actualizar_actividad():
    id_actividad = int(input("Introduce el id de la actividad que quieres actualizar:"))#Solicitamos el id de la actividad para actulizarla
    nombre_actividad = input("Ingrese el nombre de la actividad que quieres actualizar:")#Solicitamos el nombre que hay que actualizar
    horario = input("Ingrese el horario que tienes que actualizar:")#Solicitamos el horario que hay que actualizar
    duracion = int(input("Ingrese la duración que tienes que actualizar(minutos):"))#Solicitamos la duracion que hay que actualizar
    id_entrenador = int(input("Ingrese el id del entrenador que va a dar la actividad:"))#Solicitamos el id entrenadaor que hay que actuallizar
    
    actualizar_actividad = (nombre_actividad, horario, duracion, id_entrenador, id_actividad)
    consulta_actualizar = """UPDATE actividades SET nombre_actividad = %s, horario = %s, duracion = %s, id_entrenador = %s WHERE id_actividad = %s"""#Usamos la consulta UPDATE para actualizar los datos en la bse de datos
    cursor.execute(consulta_actualizar, (actualizar_actividad))
    conexion.commit()
    
    print(Fore.BLUE+ f"[Mensaje de confirmación] La actividad con el ID {id_actividad} ha sido actualizado.")#Imprimimos que los datos se han actualizado de manera correcta
    print(Style.RESET_ALL)
    
    consulta_leer = """SELECT A.id_actividad, A.nombre_actividad, A.horario, A.duracion, E.id_entrenador, E.nombre_entrenador, E.especialidad 
                    FROM actividades A
                    INNER JOIN entrenadores E
                    ON 
                    A.id_entrenador = E.id_entrenador"""
    cursor.execute(consulta_leer)
    actividades = cursor.fetchall()
    with open("actividades.txt", "w") as archivo:
        archivo.write(f"{actividades}")
    
def eliminar_actividad():
    id_actividad = int(input("Introduce el id de la actividad que deseas eliminar:"))#Solitamos el id de la actividad que hay que eliminar
    
    consulta_eliminar = """DELETE FROM actividades WHERE id_actividad = %s"""#Usamos la consulta DELETE para eliminar la actividad de la tabla actividad
    cursor.execute(consulta_eliminar, (id_actividad,))
    
    consulta_eliminar_cliente_actividad = """DELETE FROM inscripciones WHERE id_actividad = %s"""#Usamos la consulta DELETE para eliminar la actividad de inscripciones
    cursor.execute(consulta_eliminar_cliente_actividad, (id_actividad,))
    
    conexion.commit()
    print(Fore.RED+ f"[Mensaje de confirmación] La actividad con el idactividad {id_actividad} ha sido eliminado.")#Imprimimos que la actividad a sido eliminada con exito
    print(Style.RESET_ALL)
    
    consulta_leer = """SELECT A.id_actividad, A.nombre_actividad, A.horario, A.duracion, E.id_entrenador, E.nombre_entrenador, E.especialidad 
                    FROM actividades A
                    INNER JOIN entrenadores E
                    ON 
                    A.id_entrenador = E.id_entrenador"""
    cursor.execute(consulta_leer)
    actividades = cursor.fetchall()
    with open("actividades.txt", "w") as archivo:
        archivo.write(f"{actividades}")

def salir_menu_actividad():#Ceramos la consulta
    if cursor:
        cursor.close()
    if conexion:
        conexion.close()