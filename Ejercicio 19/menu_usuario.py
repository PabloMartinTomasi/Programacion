import funciones_inscripciones_cliente as FIC
from colorama import Fore, Back, Style


def menu_usuario():
    try:
        while True:
            print("1- Quieres inscribirte \n2- Salir")
            menu = int(input("Seleciona una opcion del menu:"))
            
            if menu == 1:
                FIC.registrar_cliente_inscripcion()
            elif menu == 2:
                print("Saliendo de inscripcion a actividades")
                break
            else:
                print("Seleciona una opcion del menu")
        
    except ValueError as ve:
        print(Fore.RED + f"Error: Entrada inválida. Por favor, ingrese un número. ({ve})")
        print(Style.RESET_ALL)
    except Exception as e:
        print(Fore.RED + f"Error inesperado: {str(e)}")
        print(Style.RESET_ALL)