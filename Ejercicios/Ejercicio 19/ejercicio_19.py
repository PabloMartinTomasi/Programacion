import funcion_clientes as CLI
import funcion_actividades as ACT
import funcion_entrenadores as ENT
import funciones_inscripciones as INS
from colorama import Fore, Back, Style



while True:
    try:
        print(Fore.RED+ "=== Gestión del Centro Deportivo === \n1- Gestión de Clientes \n2- Gestión de Actividades \n3- Gestión de Entrenadores \n4- Gestión de Inscripciones \n5- Salir") #Enseñamos el menu de la gestion del centro de deporte
        print(Style.RESET_ALL)
        Menu = int(input("Seleccione una opción:")) #Tenemos que selecionar una opcion del menu
        if Menu == 1:
            CLI.menu_cliente() #Si la opcion 1 es selecionada veremos el menu cliente
        elif Menu == 2:
            ACT.menu_actividades() #Si la opcion 2 es selecionada veremos el menu actividades
        elif Menu == 3:
            ENT.menu_entrenadores() #Si la opcion 3 es selecionada veremos el menu de entrenadores
        elif Menu == 4:
            INS.menu_inscripciones() #Si la opcion 4 es selecionada veremos el menu de inscripciones
        elif Menu == 5:
            print("[Mensaje] Saliendo de la gestión. ¡Hasta pronto!") #Si selecionamos la opcion 5 salimos del programa
            break
        else:
            print(Fore.YELLOW+ "Seleciona una opcion del menu") #Si selecionamos una opcion que no esta en el menu, se nos vuelve a solicitar
            print(Style.RESET_ALL)
            continue

    except ValueError as ve:
        print(Fore.RED + f"Error: Entrada inválida. Por favor, ingrese un número. ({ve})")
        print(Style.RESET_ALL)
    except Exception as e:
        print(Fore.RED + f"Error inesperado: {str(e)}")
        print(Style.RESET_ALL)