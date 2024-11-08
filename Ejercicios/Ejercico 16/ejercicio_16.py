import funcion_categorias as CAT
import funcion_producto as PRO
from colorama import Fore, Back, Style



while True:
    try:
        print(Fore.RED+ "=== Gestion de categorias y productos === \nSeleccione una opción: \n1- Categorias \n2- Productos \n3- Salir")
        print(Style.RESET_ALL)
        Menu = int(input("Seleciona una opcion del Menu:"))
        if Menu == 1:
            CAT.menu_categorias()
        elif Menu == 2:
            PRO.menu_producto()
        elif Menu == 3:
            print("[Mensaje] Saliendo de la gestión de categorias o productos. ¡Hasta pronto!")
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