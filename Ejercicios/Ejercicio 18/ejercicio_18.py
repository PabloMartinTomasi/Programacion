import funcion_categorias as CAT
import funcion_producto as PRO
import funcion_cliente as CLI
import funcion_pedido as PED
from colorama import Fore, Back, Style



while True:
    try:
        print(Fore.RED+ "=== Gestion de categorias y productos === \nSeleccione una opción: \n1- Categorias \n2- Productos \n3- Clientes \n4- Pedidos \n5- Salir")
        print(Style.RESET_ALL)
        Menu = int(input("Seleciona una opcion del Menu:"))
        if Menu == 1:
            CAT.menu_categorias()
        elif Menu == 2:
            PRO.menu_producto()
        elif Menu == 3:
            CLI.menu_cliente
        elif Menu==4:
            PED.menu_pedido()
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