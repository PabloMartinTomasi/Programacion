import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("SupermercadoPyton")
cursor = conexion.cursor()



def Visualizar_busqueda_clientes():
    while True:
        print("MENU: \n1- Visualizar todos los clientes \n2- Obtener los datos de un solo cliente \n3- Salir")
        menu = int(input("Seleciona una opcion del menu:"))
        if menu == 1: #Si se seleciona la opcion se ve la lista de los clientes
            consulta = """SELECT idcliente, dni, nombre, apellido, tlf, direccion, ciudad FROM cliente"""
            cursor.execute(consulta)
            clientes = cursor.fetchall()
            print(Fore.BLUE+"Listado de CLIENTES:")
            print(Style.RESET_ALL)
            for cliente in clientes:
                idcliente, dni, nombre, apellido, tlf, direccion, ciudad = cliente
                print(Fore.BLUE+ f"{idcliente} - {dni} - {nombre} - {apellido} - {tlf} - {direccion} - {ciudad}")
                print(Style.RESET_ALL)

        elif menu == 2: #Si se seleciona la opcion 2
            idcliente = int(input("Ingresa el ID del cliente que quieres buscar:")) #Solicitamos que introduzcas el id del cliente que quieres buscar
            consulta = f"""SELECT idcliente, dni, nombre, apellido, tlf, direccion, ciudad FROM cliente WHERE idcliente = {idcliente}"""
            cursor.execute(consulta)
            clientes = cursor.fetchall()
            print(Fore.BLUE+"Listado de CLIENTES:")
            print(Style.RESET_ALL)
            print(Fore.GREEN+ f"[Mensaje de confirmacion] Los datos del idcliente {idcliente}:") #Le enseñamos al cliente todos los cliente que hay
            print(Style.RESET_ALL)
            for cliente in clientes: #Podemos ver los datos del cliente con el id selecionado
                idcliente, dni, nombre, apellido, tlf, direccion, ciudad = cliente
                print(Fore.BLUE+ f"{idcliente} - {dni} - {nombre} - {apellido} - {tlf} - {direccion} - {ciudad}") #Le enseñamos al cliente los datos del cliente con el id que ha puesto
                print(Style.RESET_ALL)
        elif menu == 3: #Volvemos al menu princial
            break
        else: #Si el cliente seleciona una opcion que no esta en el menu
            print("Seleciona una opcion del menu")
            continue