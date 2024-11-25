from administrador import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("Centro_Deportivo")
cursor = conexion.cursor()

def menu_filtro_busqueda():
    try:
        while True: #Enseñamos el menu
            print(Fore.RED+ "===Filtros y busqueda=== \n1- Filtrar \n2- Busqueda \n3- Salir")
            print(Style.RESET_ALL)
            menu = int(input("Elige una opcion del menu:"))
            print(Style.RESET_ALL)
            if menu == 1: #Filtrar
                while True:
                    print(Fore.RED+ "===Filtrar=== \n1- Membresi \n2- Edad \n3- Salir")
                    print(Style.RESET_ALL)
                    filtrar = int(input("Seleciona una opcion del menu:"))
                    if filtrar == 1:
                        tipo_membresia()
                    elif filtrar == 2:
                        rango_edad()
                    elif filtrar == 3:
                        break
                    else:
                        print("Seleciona una opcion del menu")
                       
            elif menu == 2: #Busqueda
                while True:
                    print(Fore.RED+ "===Busqueda=== \n1- actividades por horario \n2- duración  \n3- especialidad del entrenador \n4- Salir")
                    print(Style.RESET_ALL)
                    Filtrar = int(input("Seleciona una opcion del menu:"))
                    if Filtrar == 1:
                        buscar_actividades()
                    elif Filtrar == 2:
                        buscar_duracion()
                    elif Filtrar == 3:
                        especialidad_entrenador()
                    elif Filtrar == 4:
                        break
                    else:
                        print("Seleciona una opcion del menu")
    
            elif menu == 3: #Salir
                break
            else:
                print("Seleciona una opcion del menu")
        
        
        
    except ValueError as ve:
        print(Fore.RED + f"Error: Entrada inválida. ({ve})")
        print(Style.RESET_ALL)
    except Exception as e:
        print(Fore.RED + f"Error inesperado: {str(e)}")
        print(Style.RESET_ALL)
        
        
        
        
        
        
        
        
        
        
def tipo_membresia():
    print("Tipo de membresia")
    tipo_membresia = input("Que tipo de membresi quieres ver(Mensual, Trimestral, Anual):")
    consulta = """SELECT id_cliente, nombre, edad, tipo_membresia FROM clientes
                WHERE tipo_membresia = %s
                order by tipo_membresia"""
    cursor.execute(consulta, (tipo_membresia,))
    membresia = cursor.fetchall()
    print(f"Listado de clientes con la membresi de {tipo_membresia} \nid_cliente | Nombre | Edad | tipo_membresia")
    for id_cliente, nombre, edad, tipo_membresia in membresia:
         print(f"[Mensaje]: {id_cliente} | {nombre} | {edad} | {tipo_membresia}")
         
def rango_edad():
    print("Rango de edad")
    edad = int(input("Busca los clientes con una edad especifica:"))
    consulta = """SELECT id_cliente, nombre, edad, tipo_membresia FROM clientes
                WHERE edad = %s
                order by edad"""
    cursor.execute(consulta, (edad,))
    edades = cursor.fetchall()
    print(f"Listado de clientes con {edad} año \nid_cliente | Nombre | Edad | tipo_membresia")
    for id_cliente, nombre, edad, tipo_membresia in edades:
        print(f"[Mensaje]: {id_cliente} | {nombre} | {edad} | {tipo_membresia}")
         
         
         
         
def buscar_actividades():
    print("Actividades por horario")
    horario = input("Pon el horario de la actividad que quieres buscar:")
    consulta = """SELECT id_actividad, nombre_actividad, horario, duracion, id_entrenador FROM actividades
                WHERE horario = %s
                order by horario"""
    cursor.execute(consulta,(horario,))
    actividades = cursor.fetchall()
    print(f"Listado de actividades con el horario de {horario} \nid_actividad | Nombre de la actividad | Horario | Duracion | id_entrenador")
    for id_actividad, nombre_actividad, horario, duracion, id_entrenador in actividades:
        print(f"[Mensaje]: {id_actividad} | {nombre_actividad} | {horario} | {duracion} | {id_entrenador}")
        
def buscar_duracion():
    print("Actividades por Duracion")
    duracion = int(input("Pon el tiempo de la duracion de la actividad:"))
    consulta = """SELECT id_actividad, nombre_actividad, horario, duracion, id_entrenador FROM actividades
                WHERE duracion = %s
                order by duracion"""
    cursor.execute(consulta,(duracion,))
    tiempo = cursor.fetchall()
    print(f"Listado de actividades con la duracion de {duracion} minutos \nid_actividad | Nombre de la actividad | Horario | Duracion | id_entrenador")
    for id_actividad, nombre_actividad, horario, duracion, id_entrenador in tiempo:
        print(f"[Mensaje]: {id_actividad} | {nombre_actividad} | {horario} | {duracion} | {id_entrenador}")
        
def especialidad_entrenador():
    print("Especialidad del entrenador")
    especialidad = input("Pon la especialidad del entrenador:")
    consulta = """SELECT A.id_actividad, A.nombre_actividad, A.horario, A.duracion, E.id_entrenador, E.nombre_entrenador, E.especialidad 
                FROM actividades A
                INNER JOIN entrenadores E ON 
                A.id_entrenador = E.id_entrenador
                WHERE E.especialidad = %s
                order by E.especialidad"""
    cursor.execute(consulta,(especialidad,))
    especialidades = cursor.fetchall()
    print(f"Listado de actividades de la especialidad de {especialidad} \nid_actividad | Nombre de la actividad | Horario | Duracion | id_entrenador | Nombre entrenador | especialidad")
    for id_actividad, nombre_actividad, horario, duracion, id_entrenador, nombre_entrenador, especialidad in especialidades:
        print(f"[Mensaje]: {id_actividad} | {nombre_actividad} | {horario} | {duracion} | {id_entrenador} | {nombre_entrenador} | {especialidad}")