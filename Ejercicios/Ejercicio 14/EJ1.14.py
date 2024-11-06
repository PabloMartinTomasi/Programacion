import numpy as np
from colorama import Fore, Back, Style

def partida_guardada():
    with open("partida_comenzada.txt", "r") as archivo_lectura:
        contenido = archivo_lectura.read()
    with open("partida_comenzada.txt", "w") as archivo_escritura:
        archivo_escritura.write(contenido)

tabla = np.zeros((20, 20))
tabla_sin_resolver = np.zeros((20, 20))

def colocar_barco(fila, columna, longitud, direccion):
    if direccion == "horizontal":
         if columna + longitud > 20:
            return False
         for i in range(longitud):
            if tabla[fila, columna + i] != 0:
                return False
    elif direccion == "vertical":
        if fila + longitud > 20:
            for i in range(longitud):
                if tabla[fila + i, columna] != 0:
                    return False
    return True

# Barco de longitud de 2
def barco_de_dos():
    while True:
        fila = np.random.randint(0, 20)
        columna = np.random.randint(0, 20)
        direccion = np.random.choice(["horizontal", "vertical"])
        if colocar_barco(fila, columna, 2, direccion):
            if direccion == "horizontal":
                for i in range(2):
                    tabla[fila, columna + i] = 1
            else:
                for i in range(2):
                    tabla[fila + i, columna] = 1
            break

# Barco de longitud de 3
def barco_de_tres():
    while True:
        fila = np.random.randint(0, 20)
        columna = np.random.randint(0, 20)
        direccion = np.random.choice(["horizontal", "vertical"])
        if colocar_barco(fila, columna, 3, direccion):
            if direccion == "horizontal":
                for i in range(3):
                    tabla[fila, columna + i] = 1
            else:
                for i in range(3):
                    tabla[fila + i, columna] = 1
            break

# Barco de longitud de 4
def barco_de_cuatro():
    while True:
        fila = np.random.randint(0, 20)
        columna = np.random.randint(0, 20)
        direccion = np.random.choice(["horizontal", "vertical"])
        if colocar_barco(fila, columna, 4, direccion):
            if direccion == "horizontal":
                for i in range(4):
                    tabla[fila, columna + i] = 1
            else:
                for i in range(4):
                    tabla[fila + i, columna] = 1
            break

def partida_pro():
    intentos = 0
    print(f"Aqui tienes la tabla con todo \n{tabla}")
    print(f"Aqui tienes el tablero: \n{tabla_sin_resolver} \nIntenta unidir los 3 barcos")
    while True:
        filaa = int(input("Pon las coordenadas de una fila (o 111 para poder tener el menu):"))
        if filaa == 111: #Enseñar el menu
            print(Fore.RED+ "Menu: \n1-Guardar \n2-Salir")
            print(Style.RESET_ALL)
            Menu = int(input("Seleciona una opcion del menu:"))
            if Menu == 1: #Guardar partida
                with open("partida_comenzada.txt", "w") as archivo:
                    archivo.write(f"{tabla_sin_resolver}")
                filaa = int(input("Pon las coordenadas de una fila:"))
            elif Menu == 2: #Salir de la partida
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
partida_guardada()
partida_pro() 