import funcion_clientes as CLI
import funcion_actividades as ACT
import funcion_entrenadores as ENT
import funciones_inscripciones as INS
from colorama import Fore, Back, Style



while True:
    try:
        print(Fore.RED+ "=== Gestión del Centro Deportivo === \n1- Gestión de Clientes \n2- Gestión de Actividades \n3- Gestión de Entrenadores \n4- Gestión de Inscripciones \n5- Salir")
        print(Style.RESET_ALL)
        Menu = int(input("Seleccione una opción:"))
        if Menu == 1:
            CLI.menu_cliente()

        elif Menu == 2:
            ACT.menu_actividades()

        elif Menu == 3:
            ENT.menu_entrenadores()

        elif Menu == 4:
            INS.menu_inscripciones()

        elif Menu == 5:
            print("[Mensaje] Saliendo de la gestión. ¡Hasta pronto!")
            break
        
        else:
            print(Fore.YELLOW+ "Seleciona una opcion del menu")
            print(Style.RESET_ALL)
            continue

    except ValueError as ve:
        print(Fore.RED + f"Error: Entrada inválida. Por favor, ingrese un número. ({ve})")
        print(Style.RESET_ALL)
    except Exception as e:
        print(Fore.RED + f"Error inesperado: {str(e)}")
        print(Style.RESET_ALL)