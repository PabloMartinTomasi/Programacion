from administrador import funcion_clientes as CLI
from administrador import funcion_actividades as ACT
from administrador import funcion_entrenadores as ENT
from administrador import funciones_inscripciones as INS
from administrador import funcion_Filtros_Busqueda as FFB
from administrador import funcion_reportes as FR
from colorama import Fore, Back, Style



def menu_administrador():
    try:
        while True:
            print("1- Gestión de Clientes \n2- Gestión de Actividades \n3- Gestión de Entrenadores \n4- Gestión de Inscripciones \n5- Filtros y busqueda \n6- Generar reportes \n7- Salir")
            menu = int(input("Seleciona una opcion del menu:"))
            
            if menu == 1:
                CLI.menu_cliente()
            elif menu == 2:
                ACT.menu_actividades()
            elif menu == 3:
                ENT.menu_entrenadores()
            elif menu == 4:
                INS.menu_inscripciones()
            elif menu == 5:
                FFB.menu_filtro_busqueda()
            elif menu == 6:
                FR.menu_reportes
            elif menu == 7:
                print("Saliendo")
                break
    except ValueError as ve:
        print(Fore.RED + f"Error: Entrada inválida. Por favor, ingrese un número. ({ve})")
        print(Style.RESET_ALL)
    except Exception as e:
        print(Fore.RED + f"Error inesperado: {str(e)}")
        print(Style.RESET_ALL)