import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("Centro_Deportivo")
cursor = conexion.cursor()


def menu_reportes():
    while True:
        print("1- Número de clientes inscritos por actividad \n2- Promedio de edad de los clientes inscritos en cada actividad \n3- Actividades más populares \n3- Sakir")
        menu = int(input("Seleciona una opcion del menu:"))
        if menu == 1:
            clientes_por_actividad()
        elif menu == 2:
            edad_promedio()
        elif menu == 3:
            actividad_mas_popular()
        elif menu == 5:
            break
        else:
            print("Seleciona una opcion del menu")


def clientes_por_actividad():
    consulta = """SELECT A.id_actividad, A.nombre_actividad, 
                A.horario, A.duracion, 
                A.id_entrenador, COUNT(I.id_cliente) AS total_clientes
                FROM actividades A 
                INNER JOIN inscripciones I
                ON A.id_actividad = I.id_actividad
                GROUP BY 
                A.id_actividad, 
                A.nombre_actividad, 
                A.horario, 
                A.duracion, 
                A.id_entrenador"""
    cursor.execute(consulta,)
    clientes = cursor.fetchall()
    print("Los clientes por actividad es: \nid_actividad | nombre_actividad | horario | duracion | id_entrenador | total_clientes")
    for id_actividad, nombre_actividad, horario, duracion, id_entrenador, total_clientes in clientes:
        print(f"[Mensaje]: {id_actividad} | {nombre_actividad} | {horario} | {duracion} | {id_entrenador} | {total_clientes}")
        
def edad_promedio():
    consulta = """SELECT A.id_actividad, A.nombre_actividad, 
                A.horario, A.duracion, 
                A.id_entrenador, AVG(C.edad) AS edad_promedio
                FROM actividades A 
                JOIN inscripciones I
                ON A.id_actividad = I.id_actividad
                JOIN clientes C
                ON I.id_cliente = C.id_cliente
                GROUP BY 
                A.id_actividad, 
                A.nombre_actividad, 
                A.horario, 
                A.duracion, 
                A.id_entrenador;"""
    cursor.execute(consulta,)
    promedio = cursor.fetchall()
    print("Lista de la edad promedia de los clientes en cada actividad \nid_actividad | nombre_actividad | horario | duracion | id_entrenador | edad_promedio")
    for id_actividad, nombre_actividad, horario, duracion, id_entrenador, edad_promedio in promedio:
        print(f"[Mensaje]: {id_actividad} | {nombre_actividad} | {horario} | {duracion} | ´{id_entrenador} | {edad_promedio}")
        
def actividad_mas_popular():
    consulta = """SELECT A.id_actividad, A.nombre_actividad, 
                A.horario, A.duracion, 
                A.id_entrenador, COUNT(I.id_cliente) AS total_clientes
                FROM actividades A 
                INNER JOIN inscripciones I
                ON A.id_actividad = I.id_actividad
                GROUP BY 
                A.id_actividad, 
                A.nombre_actividad, 
                A.horario, 
                A.duracion, 
                A.id_entrenador
                order by total_clientes DESC;"""
    cursor.execute(consulta,)
    popular = cursor.fetchall()
    print("Lista de actividades mas populares")
    for id_actividad in popular:
        print(f"{id_actividad}")