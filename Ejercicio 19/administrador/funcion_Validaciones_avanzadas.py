from administrador import conexion_bd as bd
from colorama import Fore, Back, Style
from prettytable import PrettyTable as PT


conexion = bd.conectar("Centro_Deportivo")
cursor = conexion.cursor()

def menu_validaciones():
    try:
        while True:
            print("1- Actividades a la misma hora \n2- Tiempo solo 120 minutos \n3- Salir")
            menu = int(input("Seleciona una opcion del menu:"))
            if menu == 1:
                dos_actividades()
            elif menu == 2:
                duracion_limite()
            elif menu == 3:
                print("Saliendo")
                break
            else:
                print("Seleciona una opcion del menu")
        
    except ValueError as ve:
        print(Fore.RED + f"Error: Entrada inválida. Por favor, ingrese un número. ({ve})")
        print(Style.RESET_ALL)
    except Exception as e:
        print(Fore.RED + f"Error inesperado: {str(e)}")
        print(Style.RESET_ALL)


def dos_actividades():
    table = PT()
    consulta="""SELECT C.id_cliente, C.nombre, 
            A.id_actividad, A.nombre_actividad, A.horario,
            I.id_inscripcion
            FROM clientes C
            JOIN inscripciones I ON C.id_cliente = I.id_cliente
            JOIN actividades A ON I.id_actividad = A.id_actividad"""
    cursor.execute(consulta,)
    actividades = cursor.fetchall()
    
    table.field_names = ["id_cliente", "nombre", "id_actividad", "nombre_actividad", "horario", "id_inscripcion"]
    
    for id_cliente, nombre, id_actividad, nombre_actividad, horario, id_inscripcion in actividades:
        table.add_row([id_cliente, nombre, id_actividad, nombre_actividad, horario, id_inscripcion])
    print(table)
    
def duracion_limite():
    table = PT()
    consulta="""SELECT A.id_actividad, A.duracion, E.id_entrenador, E.especialidad
                FROM actividades A
                JOIN entrenadores E ON A.id_entrenador = E.id_entrenador
                WHERE A.duracion <= 120"""
    cursor.execute(consulta,)
    duracionn = cursor.fetchall()
    
    table.field_names = ["id_actividad", "duracion", "id_entrenador", "especialidad"]
    for id_actividad, duracion, id_entrenador, especialidad in duracionn:
        table.add_row([id_actividad, duracion, id_entrenador, especialidad])
    print(table)