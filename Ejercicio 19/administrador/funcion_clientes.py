from administrador import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("Centro_Deportivo")
cursor = conexion.cursor()

def menu_cliente():
    try:
        while True: #Enseñamos el menu
            print(Fore.RED+ "===Gestion Clientes=== \n1- Crear un nuevo cliente \n2- Leer la lista de clientes \n3- Actualizar información de un cliente \n4- Eliminar un cliente \n5- Salir")
            menu = int(input("Elige una opcion del menu:"))
            print(Style.RESET_ALL)
            if menu == 1: #Crear un nuevo cliente
                nuevo_cliente()
            elif menu == 2: #Leer la lista de clientes 
                leer_clientes()
            elif menu == 3: #Actualizar información de un cliente
                actualizar_cliente()
            elif menu == 4: #Eliminar un cliente (y sus inscripciones asociadas)
                eliminar_cliente()
            elif menu == 5: #Salir del menu clientes
                break
            else:
                print("Seleciona una opcion del menu")
    except ValueError as ve:
        print(Fore.RED + f"Error: Entrada inválida. ({ve})")
        print(Style.RESET_ALL)
    except Exception as e:
        print(Fore.RED + f"Error inesperado: {str(e)}")
        print(Style.RESET_ALL)
        

def nuevo_cliente():
    nombre = input("Introduce el nombre del cliente:") #Solicitamos el nombre al cliente
    edad = int(input("Introduce la edad del cliente:")) #Solicitamos la edad del clientes
    tipo_membresia = input("Introduce el tipo de membresia del cliente(Mensual, Trimestral, Anual):") #Preguntamos al cliente que tipo de membresia quiere
        
    nuevo_cliente = (nombre, edad, tipo_membresia)
    consulta_cliente = """INSERT INTO clientes (nombre, edad, tipo_membresia) VALUES (%s, %s, %s)""" #Hacemos INSERT INTO para ponerlo en la base de datos
    cursor.execute(consulta_cliente, nuevo_cliente)
    conexion.commit()
    id_cliente = cursor.lastrowid #Generamos un id al cliente
    print(Fore.CYAN+ f"[Mensaje]: Cliente registrado exitosamente, con el idcliente {id_cliente}.") #Enseñamos al cliente su id
    print(Style.RESET_ALL)
    
    consulta_leer = """SELECT id_cliente, nombre, edad, tipo_membresia FROM clientes""" 
    cursor.execute(consulta_leer)
    clientes = cursor.fetchall()
    with open("clientes.txt", "w") as archivo:
        archivo.write(f"{clientes} \n")

        
def leer_clientes():
    consulta_leer = """SELECT id_cliente, nombre, edad, tipo_membresia FROM clientes""" #Usamos la consulta SELECT para leer los datos de todos los clientes
    cursor.execute(consulta_leer)
    clientes = cursor.fetchall()
    print(Fore.YELLOW+"Listado de clientes: \nid_cliente | nombre | edad | tipo_membresia")
    print(Style.RESET_ALL)
    for id_cliente, nombre, edad, tipo_membresia in clientes:
        print(f"[Mensaje]: {id_cliente} | {nombre} | {edad} | {tipo_membresia}") #Imprimimos todos los datos de todos los clientes
        
    with open("clientes.txt", "w") as archivo:
        archivo.write(f"{clientes} \n")
        
def actualizar_cliente():
    id_cliente = int(input("Introduce el id del cliente que quieres actualizar:"))#Solicitamos el id cliente para actualizar los datos
    nombre = input("Introduce el nombre del cliente que quieres actualizar:")#Solicitamos el nombre del cliente para actualizar
    edad = int(input("Introduce la edad del cliente que quieres actualizar:"))#Solicitamos la edad para actualizar
    tipo_membresia = input("Introduce el tipo de membresia del cliente que quieres actualizar(Mensual, Trimestral, Anual):")#Solicitamos el tipo de membresia para actualizar
    actualizar_cliente = (nombre, edad, tipo_membresia, id_cliente)
    consulta_actualizar = """UPDATE clientes SET nombre = %s, edad = %s, tipo_membresia = %s WHERE id_cliente = %s""" #Usamos la consulta update para que los datos actualizados se pongan en la base de datos
    cursor.execute(consulta_actualizar, actualizar_cliente)
    conexion.commit()
    print(Fore.GREEN+ f"[Mensaje de confirmación] El  cliente con ID {id_cliente} ha sido actualizado.")#Imprimimos que la actualizacion de los datos se ha realizado con exito
    print(Style.RESET_ALL)
    
    consulta_leer = """SELECT id_cliente, nombre, edad, tipo_membresia FROM clientes""" 
    cursor.execute(consulta_leer)
    clientes = cursor.fetchall()
    with open("clientes.txt", "w") as archivo:
        archivo.write(f"{clientes} \n")
    
def eliminar_cliente():
    id_cliente = int(input("Introduce el idcliente que quieres eliminar:"))#Solicitamos el id del cliente que hay que eliminar
    
    consulta_eliminar_cliente_actividad = """DELETE FROM inscripciones WHERE id_cliente = %s"""#Usamos esta consulta para eliminar el cliente de la tabla inscripciones
    cursor.execute(consulta_eliminar_cliente_actividad, (id_cliente,))
    
    consulta_eliminar = """DELETE FROM clientes WHERE id_cliente = %s"""#Eliminamos al cliente de la tabla clientes
    cursor.execute(consulta_eliminar, (id_cliente,))
    
    
    conexion.commit()
    
    print(Fore.RED+ f"[Mensaje de confirmación] El cliente con el idcliente {id_cliente} ha sido eliminado.")
    print(Style.RESET_ALL)
    
    consulta_leer = """SELECT id_cliente, nombre, edad, tipo_membresia FROM clientes""" 
    cursor.execute(consulta_leer)
    clientes = cursor.fetchall()
    with open("clientes.txt", "w") as archivo:
        archivo.write(f"{clientes}")