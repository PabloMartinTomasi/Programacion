import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("Centro_Deportivo")
cursor = conexion.cursor()


def registrar_cliente_inscripcion():
    consulta_leer = """SELECT A.id_actividad, A.nombre_actividad, A.horario, A.duracion, E.id_entrenador, E.nombre_entrenador, E.especialidad 
                    FROM actividades A
                    INNER JOIN entrenadores E
                    ON A.id_entrenador = E.id_entrenador"""#Usamos la consulta para leer los datos de la actividad y del entrenedaro que hace dicha actividad
    cursor.execute(consulta_leer)
    actividades = cursor.fetchall()
    

    print(Fore.YELLOW+"Listado de actividades: id_actividad | nombre_actividad | horario | duracion | id_entrenador | nombre_entrenador | especialidad")
    print(Style.RESET_ALL)
    for id_actividad, nombre_actividad, horario, duracion, id_entrenador, nombre_entrenador, especialidad in actividades:
        print(f"[Mensaje]: {id_actividad} | {nombre_actividad} | {horario} | {duracion} | {id_entrenador} | {nombre_entrenador} | {especialidad}")#Imprimimos los datos del select
        print(Style.RESET_ALL)
    
    id_cliente = int(input("Ingresa el id del cliente, para poderlo inscribir:"))#Pedimos el id del cliente para incribirlo en dicha actividad
    id_actividad = int(input("Ingrese el id de la actividad a la que se quiere inscribir el cliente:"))#Pedimos el id de la actividad para incribirlo en la actividad
    
    nuevo_inscripcion = (id_cliente, id_actividad)
    consulta_inscripcion = """INSERT INTO inscripciones (id_cliente, id_actividad) VALUES (%s, %s)"""#Usamos esta consulta para insertar el los datos de la nueva inscripcion
    cursor.execute(consulta_inscripcion,  nuevo_inscripcion)
    conexion.commit()
    id_inscripcion = cursor.lastrowid
    print(Fore.GREEN+ f"[Mensaje]: Inscripción registrada exitosamente. El id de tu inscripcion es {id_inscripcion}")#Imprimimos el id de la incripcion a la actividad
    print(Style.RESET_ALL)