import numpy as np
from colorama import Fore, Back, Style

tabla = np.zeros((20, 20))
tabla_sin_resolver = np.zeros((20, 20))

def partida_cargada():
    try:
        with open("partida_comenzada.txt", "r") as archivo:
            data = archivo.readlines()
            tabla_sin_resolver[:,:] = np.array([list(map(int, line.strip().slipt)) for line in data])
            print("Partida guardada encontrada.")
            return True
    except FileNotFoundError: #Si no se a encontrado ninguna partida guardad, se inicia una nueva
        return False

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
        
def menu():
    print(Fore.RED+ "Menu: \n1-Guardar \n2-Salir")
    print(Style.RESET_ALL)
    opcion = int(input("Seleciona una opcion del menu:"))
    return opcion

def partida_pro():
    if not partida_cargada():
        colocar_barco(barco_de_dos(), barco_de_tres(), barco_de_cuatro())
        print("Empezando partida.")
    print(f"Aqui tienes la partida con los barcos: \n{tabla}")
    print(f"Aqui tienes la partida sin los barcos: \n{tabla_sin_resolver}")
    intentos = 0
    while barcos < 9:
        print(f"Aqui tienes el tablero con los barcos: \n{tabla}")
        print(f"Aqui tienes el tablero sin los barcos: \{tabla_sin_resolver}")
        try:
            filaa = int(input("Escribe la fila que quieres atacar (o 111 para poder ver el menu):"))
            if filaa == 1:
                opcion = menu()
                if opcion == 1:
                    
        
        

partida_pro() 






