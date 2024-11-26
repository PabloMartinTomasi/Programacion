from administrador import menu_administrador
from usuario import menu_usuario

from colorama import Fore, Back, Style

while True:
    print("===Gestion de un centro deportivo=== \n1- Administrador \n2- Cliente \n3- Salir")
    menu = int(input("Seleciona una opcion del menu:"))
    if menu == 1:
        menu_administrador.menu_administrador()
    elif menu == 2:
        menu_usuario.menu_usuario()
    elif menu == 3:
        print("Saliendo")
        break
    else:
        print("Seleciona una opcion del menu")