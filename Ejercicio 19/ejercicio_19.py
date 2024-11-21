from colorama import Fore, Back, Style



while True:
    try:

    except ValueError as ve:
        print(Fore.RED + f"Error: Entrada inválida. Por favor, ingrese un número. ({ve})")
        print(Style.RESET_ALL)
    except Exception as e:
        print(Fore.RED + f"Error inesperado: {str(e)}")
        print(Style.RESET_ALL)