import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("Centro_Deportivo")
cursor = conexion.cursor()

def menu_inscripciones():
    try:
        while True:
            print(Fore.RED+ "===Gestión de Inscripciones=== \n1- Registrar la inscripción de un cliente a una actividad \n2- Leer todas las inscripciones, mostrando información del cliente y la actividad \n3- Eliminar una inscripción específica \n4- Salir")
            menu = int(input("Elige una opcion del menu:"))
            print(Style.RESET_ALL)
            if menu == 1:#Registramos a un cliente en una actividad si se seleciona la opcion 1
                registrar_cliente_inscripcion()
            elif menu == 2:#Leemos las incripciones a actividades si se seleciona la opcion 2
                leer_inscripciones()
            elif menu == 3:#Eleminamos a la persona inscrita en dicha actividad si se seleciona la opcion 3
                eliminar_inscripcion()
            elif menu == 4:#Salir de la gestion de inscripciones si se selciona la opcion 4
                salir_menu_inscripciones()
                break
            else:
                print("Seleciona una opcion del menu")
                
    except ValueError as ve:
        print(Fore.RED + f"Error: Entrada inválida. ({ve})")
        print(Style.RESET_ALL)
    except Exception as e:
        print(Fore.RED + f"Error inesperado: {str(e)}")
        print(Style.RESET_ALL)
        
def registrar_cliente_inscripcion():
    id_cliente = int(input("Ingresa el id del cliente, para poderlo inscribir:"))#Pedimos el id del cliente para incribirlo en dicha actividad
    id_actividad = int(input("Ingrese el id de la actividad a la que se quiere inscribir el cliente:"))#Pedimos el id de la actividad para incribirlo en la actividad
    
    nuevo_inscripcion = (id_cliente, id_actividad)
    consulta_inscripcion = """INSERT INTO inscripciones (id_cliente, id_actividad) VALUES (%s, %s)"""#Usamos esta consulta para insertar el los datos de la nueva inscripcion
    cursor.execute(consulta_inscripcion,  nuevo_inscripcion)
    conexion.commit()
    id_inscripcion = cursor.lastrowid
    print(Fore.GREEN+ f"[Mensaje]: Inscripción registrada exitosamente. El id de tu inscripcion es {id_inscripcion}")#Imprimimos el id de la incripcion a la actividad
    print(Style.RESET_ALL)
    
def leer_inscripciones():
    consulta_inscripcion = """SELECT i.id_inscripcion, c.nombre AS Cliente, a.nombre_actividad AS Actividad, 
                        a.horario AS Horario
                        FROM inscripciones AS i
                        JOIN clientes AS c ON i.id_cliente = c.id_cliente
                        JOIN actividades AS a ON i.id_actividad = a.id_actividad;"""#Usamos la consulta select para poder ver las inscripciones
    cursor.execute(consulta_inscripcion)
    inscripciones = cursor.fetchall()
    print(Fore.YELLOW+"Listado de actividaes: \ID Inscripción | Cliente  | Actividad | Horario")
    print(Style.RESET_ALL)
    for id_inscripcion, nombre, nombre_actividad, horario in inscripciones:
        print(f"[Mensaje]: {id_inscripcion} | {nombre} | {nombre_actividad} | {horario}")
        print(Style.RESET_ALL)
       
def eliminar_inscripcion():
    id_inscripcion = int(input("Introduce el id de la inscripcion que deseas eliminar:"))#Solicitamos el id de la inscripcion para eliminar al cliente incrito
    consulta_eliminar = """DELETE FROM inscripciones WHERE id_inscripcion = %s"""#Usamos la consulta DELETE para eliminar la inscripcion de la base de datos
    cursor.execute(consulta_eliminar, (id_inscripcion,))
    conexion.commit()
    print(Fore.RED+ f"[Mensaje de confirmación] La inscripcion con el id {id_inscripcion} ha sido eliminado.")#Imprimos que la eliminacion de la inscripcion se ha realizado con exito
    print(Style.RESET_ALL)

def salir_menu_inscripciones():
    if cursor:
        cursor.close()
    if conexion:
        conexion.close()