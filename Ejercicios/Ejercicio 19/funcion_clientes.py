import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("Centro_Deportivo")
cursor = conexion.cursor()

def menu_cliente():
    try:
        while True:
            print(Fore.RED+ "===Gestion Clientes=== \n1- Crear un nuevo cliente \n2- Leer la lista de clientes \n3- Actualizar información de un cliente \n4- Eliminar un cliente \n5- Salir")
            menu = int(input("Elige una opcion del menu:"))
            print(Style.RESET_ALL)
            if menu == 1:
                nuevo_cliente()
                
            elif menu == 2:
                leer_clientes()
                
            elif menu == 3:
                actualizar_cliente()
                
            elif menu == 4:
                eliminar_cliente()
                
            elif menu == 5:
                salir_menu_cliente()
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
    nombre = input("Introduce el nombre del cliente:")
    edad = int(input("Introduce la edad del cliente:"))
    tipo_membresia = input("Introduce el tipo de membresia del cliente(Mensual, Trimestral, Anual):")
        
    nuevo_cliente = (nombre, edad, tipo_membresia)
    consulta_cliente = """INSERT INTO clientes (nombre, edad, tipo_membresia) VALUES (%s, %s, %s)"""
    cursor.execute(consulta_cliente, nuevo_cliente)
    conexion.commit()
    id_cliente = cursor.lastrowid
    print(Fore.CYAN+ f"[Mensaje]: Cliente registrado exitosamente, con el idcliente {id_cliente}.")
    print(Style.RESET_ALL)

        
def leer_clientes():
    consulta_leer = """SELECT id_cliente, nombre, edad, tipo_membresia FROM clientes"""
    cursor.execute(consulta_leer)
    clientes = cursor.fetchall()
    print(Fore.YELLOW+"Listado de clientes: \nid_cliente | nombre | edad | tipo_membresia")
    print(Style.RESET_ALL)
    for id_cliente, nombre, edad, tipo_membresia in clientes:
        print(f"[Mensaje]: {id_cliente} | {nombre} | {edad} | {tipo_membresia}")
        
def actualizar_cliente():
    id_cliente = int(input("Introduce el id del cliente que quieres actualizar:"))
    nombre = input("Introduce el nombre del cliente que quieres actualizar:")
    edad = int(input("Introduce la edad del cliente que quieres actualizar:"))
    tipo_membresia = input("Introduce el tipo de membresia del cliente que quieres actualizar(Mensual, Trimestral, Anual):")
    actualizar_cliente = (nombre, edad, tipo_membresia, id_cliente)
    consulta_actualizar = """UPDATE clientes SET nombre = %s, edad = %s, tipo_membresia = %s WHERE id_cliente = %s"""
    cursor.execute(consulta_actualizar, actualizar_cliente)
    conexion.commit()
    print(Fore.GREEN+ f"[Mensaje de confirmación] El  cliente con ID {id_cliente} ha sido actualizado.")
    print(Style.RESET_ALL)
    
def eliminar_cliente():
    id_cliente = int(input("Introduce el idcliente que quieres eliminar:"))
    
    consulta_eliminar_cliente_actividad = """DELETE FROM inscripciones WHERE id_cliente = %s"""
    cursor.execute(consulta_eliminar_cliente_actividad, (id_cliente,))
    
    consulta_eliminar = """DELETE FROM clientes WHERE id_cliente = %s"""
    cursor.execute(consulta_eliminar, (id_cliente,))
    
    
    conexion.commit()
    
    print(Fore.RED+ f"[Mensaje de confirmación] El cliente con el idcliente {id_cliente} ha sido eliminado.")
    print(Style.RESET_ALL)

def salir_menu_cliente():
    if cursor:
        cursor.close()
    if conexion:
        conexion.close()