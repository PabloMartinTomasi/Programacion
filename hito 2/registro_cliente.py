import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("SupermercadoPyton")
cursor = conexion.cursor()


def registro_cliente():
    while True:
        print("MENU: \n1- Crear un nuevo cliente \n2- Salir")
        menu = int(input("Seleciona una opcion del menu:"))
        if menu == 1: #Si se seleciona la opcion 1, vamos a poder crear un nuevo cliente
            idcliente = int(input("Introduce tu ID cliente:"))
            dni = input("Introduce tu DNI:")
            nombre = input("Introduce tu nombre:")
            apellido = input("Introduce tu apellido:")
            tlf = int(input("Introduce tu numero de telefono:"))
            direccion = input("Introduce tu direcion:")
            ciudad = input("Introduce tu ciudad:")
            nuevo_cliente = (idcliente, dni, nombre, apellido, tlf, direccion, ciudad)
            consulta = """INSERT INTO cliente (idcliente, dni, nombre, apellido, tlf, direccion, ciudad) VALUES (%s, %s, %s, %s, %s, %s, %s)"""
            cursor.execute(consulta, nuevo_cliente)
            conexion.commit()
            print(Fore.GREEN+ f"[Mensaje de confirmacion] El cliente {nombre} ha sido creado con éxito.")
            print(Style.RESET_ALL)
        elif menu == 2: #Volvemos al menu principal
            if cursor:
                cursor.close()
            if conexion:
                conexion.close()
            break
        else: #Si se seleciona una opcion que no esta en el MENU, te la vuelva a pedir
            print("Porfavor seleciona una opcion del menu")
            continue