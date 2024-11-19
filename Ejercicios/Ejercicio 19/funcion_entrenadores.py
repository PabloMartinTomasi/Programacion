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
            if menu == 1:#Creamos un nuevo entrenador si se seleciona la opcio 1
                crear_entrenador()
            elif menu == 2:#Si se seleciona la opcion 2 enseñamos a todos los entrenadores
                leer_entrenador()
            elif menu == 3:#Actualizamos los datos de un entrenador si se selciona la opcion 3
                actualizar_entrenador()
            elif menu == 4:#Eleminamos a un entrenador si se selciona la opcion 4
                eliminar_entrenador()
            elif menu == 5:#Salimos del menu de entrenadores si se selciona la opcion 5
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
    nombre_entrenador = input("Ingresa el nombre del entrenador:")#Solicitamos el nombre del entrenador
    especialidad = input("Ingresa la especialidad del entrenador:")#Solicitamos la especialidad del entrenador
    
    nuevo_entrenador = (nombre_entrenador, especialidad)
    consulta_entrenador = """INSERT INTO entrenadores (nombre_entrenador, especialidad) VALUES (%s, %s)"""#usamos la consulta INSERT INTO para insertar los datos en la base de datos
    cursor.execute(consulta_entrenador, nuevo_entrenador)
    conexion.commit()
    id_entrenador = cursor.lastrowid
    print(Fore.GREEN+ f"[Mensaje]: El entrenador a sido registrado exitosamente. Con el id {id_entrenador}")#Imprimimos el id del nuevo entrenador
    print(Style.RESET_ALL)
    
def leer_entrenador():
    consulta_entrenador = """SELECT id_entrenador, nombre_entrenador, especialidad FROM entrenadores"""#Usamos la consulta SELECT para poder ver todos los entrenedaores
    cursor.execute(consulta_entrenador)
    entrenadores = cursor.fetchall()
    print(Fore.YELLOW+"Listado de actividaes: \IdEntrenador | Nombre | Especialidad")
    print(Style.RESET_ALL)
    for id_entrenador, nombre_entrenador, especialidad in entrenadores:
        print(f"[Mensaje]: {id_entrenador} | {nombre_entrenador} | {especialidad}")
        print(Style.RESET_ALL)
        
def actualizar_entrenador():
    id_entrenador = int(input("Ingresa el id del entrenador que hay que actualizar:"))#Pedimos que se intriduzca el id del entrenador para actualizar sus datos 
    nombre_entrenador = input("Ingresa el nombre del entrenador que hay que actualizar:")#Pedimos que pongan el nombre del entrenador
    especialidad = input("Ingresa la especialidad del entrenador que hay que actualizar:")#Pedimos que ponga la especialidad
    
    actualizar_entrenador = (nombre_entrenador, especialidad, id_entrenador)
    consulta_actualizar = """UPDATE entrenadores SET nombre_entrenador = %s, especialidad = %s WHERE id_entrenador = %s"""#Usamos la consulta UPDATE para actualizar los datos que se han pedido
    cursor.execute(consulta_actualizar, (actualizar_entrenador))
    conexion.commit()
    
    print(Fore.BLUE+ f"[Mensaje de confirmación] Los datos del entrenador {nombre_entrenador} ha sido actualizado.")#Imprimimos que los datos han sido actulizados con exito
    print(Style.RESET_ALL)
    
def eliminar_entrenador():
    id_entrenador = int(input("Introduce el id de la actividad que deseas eliminar:"))#Solicitamos el id del entrenador que hay que eliminar
    
    consulta_eliminar = """DELETE FROM entrenadores WHERE id_entrenador = %s"""#Usamos la consulta DELETE para eliminar el entrendaor
    cursor.execute(consulta_eliminar, (id_entrenador,))
    
    consulta_actividad = """DELETE FROM actividades WHERE id_entrenador = %s"""#Usamos la consulta DELETE para eliminar las actividades que hace el entrenador
    cursor.execute(consulta_actividad, (id_entrenador,))
    
    conexion.commit()
    print(Fore.RED+ f"[Mensaje de confirmación] El entrenador ha sido eliminado.")#Imprimimos que el entrenador a sido eliminado
    print(Style.RESET_ALL)

def salir_menu_entrenadores():
    if cursor:
        cursor.close()
    if conexion:
        conexion.close()