import numpy as np
from colorama import Fore, Back, Style

with open("partida_comenzada.txt", "r") as archivo:
    contenido = archivo.readlines()

tabla = np.zeros((20, 20))
tabla_sin_resolver = np.zeros((20, 20))
        
 
def barco_de_dos():
    columna = np.random.randint(1, 20)
    fila = np.random.randint(1, 20)
    tabla [fila, columna] = 1
    print("Se a añadido a la tabla un barco de longitud de 2")
    
def barco_de_tres():
    columna = np.random.randint(1, 20)
    fila = np.random.randint(1, 20)
    tabla [fila, columna] = 1
    print("Se a añadido a la tabla un barco de longitud de 3")
    
def barco_de_cuatro():
    columna = np.random.randint(1, 20)
    fila = np.random.randint(1, 20)
    tabla [fila, columna] = 1
    print("Se a añadido a la tabla un barco de longitud de 4")


def partida():
    intentos = 0
    print(f"Aqui tienes el tablero: \n{tabla_sin_resolver} \nIntenta unidir los 3 barcos")
    print(f"Aqui tienes la tabla con todo \n{tabla}")
    
    while True:
        filaa = int(input("Pon las coordenadas de una fila:"))
        if filaa == 111:
            print(Fore.RED+ "Menu: \n1-Guardar \n2-Salir")
            print(Style.RESET_ALL)
            Menu = int(input("Seleciona una opcion del menu:"))
            if Menu == 1:
                with open("partida_comenzada.txt", "w") as archivo:
                    archivo.write(f"{tabla_sin_resolver}")
                filaa = int(input("Pon las coordenadas de una fila:"))
            elif Menu == 2:
                print("Saliendo de la partida")
                break
            else:
                print("Porfavor seleciona una opcion del menu!")        
        columnaa = int(input("Pon las coordenadas de una columna:"))
        
        match tabla[filaa -1, columnaa -1]:
            case 2:
                print(Fore.GREEN+"Ya has probado esa posicion. Vuelve a intentarlo con otra posicion")
                print(Style.RESET_ALL)
            case 0:
                print(Fore.BLUE+"Agua")
                print(Style.RESET_ALL)
                intentos = intentos + 1
                tabla_sin_resolver [filaa -1, columnaa -1] = 2
                print(tabla_sin_resolver)
            case 1:
                print(f"¡Has hundido un barco! Despues de {intentos} intentos")
                intentos = intentos + 1
                print(tabla)
                break
    
    
        
barco_de_dos()
barco_de_tres()
barco_de_cuatro()
partida() 