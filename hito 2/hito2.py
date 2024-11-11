import conexion_bd as bd
import registro_cliente as RC
import Visualizar_busqueda_clientes as VBC
from colorama import Fore, Back, Style


conexion = bd.conectar("supermercado")
cursor = conexion.cursor()

while True:
    try:
        print(Fore.RED+ "===  === \nSeleccione una opción: \n1- Registro de clientes nuevos \n2- Visualizar clientes y obtener datos sobre clientes en concreto \n3- Salir")
        print(Style.RESET_ALL)
        Menu = int(input("Seleciona una opcion del Menu:"))
        if Menu == 1:
            RC.registro_cliente()
        elif Menu == 2:
            VBC.Visualizar_busqueda_clientes()
        elif Menu == 3:
            print("[Mensaje] Saliendo de la gestión de categorias o clientes. ¡Hasta pronto!")
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