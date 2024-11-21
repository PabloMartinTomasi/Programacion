import conexion_bd as bd
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
                    print(Fore.RED+ "===Filtrar=== \n1- Clientes tipo membresia \n2- Rango de edad \n3- Salir")
                    print(Style.RESET_ALL)
                    filtrar = int(input("Seleciona una opcion del menu:"))
                    if filtrar == 1:
                        
                        
                        
            elif menu == 2: #Busqueda
                while True:
                    print(Fore.RED+ "===Filtros y busqueda=== \n1- Filtrar \n2- Busqueda \n3- Salir")
                    print(Style.RESET_ALL)
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
    print("Tipo de membresia \n1- Mensual \n2- Trimestral \n3- Anual \n4- Salir")
    membresia = int(input("Seleciona una opcion del menu:"))
    while True:
        if membresia == 1:
            consulta = """SELECT id_cliente, nombre, edad, tipo_membresia FROM clientes
                    WHERE tipo_membresia = Anual
                    order by tipo_membresia;"""
            cursor.execute(consulta)
            clientes = cursor.fetchall()
            print(Fore.YELLOW+"Listado de clientes: \nid_cliente | nombre | edad | tipo_membresia")
            print(Style.RESET_ALL)
            for id_cliente, nombre, edad, tipo_membresia in clientes:
                print(f"[Mensaje]: {id_cliente} | {nombre} | {edad} | {tipo_membresia}")