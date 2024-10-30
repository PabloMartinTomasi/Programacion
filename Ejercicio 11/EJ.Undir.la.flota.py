import numpy as np

tabla = np.zeros((5, 5))
tabla_sin_resolver = np.zeros((5, 5))

columna = np.random.randint(1, 5)
fila = np.random.randint(1, 5)
tabla [fila, columna] = 1

def partida():
    intentos = 0
    print(f"Aqui tienes el tablero: \n{tabla_sin_resolver} \nIntenta unidir el barco")
    while True:
        filaa = int(input("Pon las coordenadas de una fila:"))
        columnaa = int(input("Pon las coordenadas de una columna:"))
        match tabla[filaa -1, columnaa -1]:
            case -1:
                print("Ya has probado esa posicion. Vuelve a intentarlo con otra posicion")
            case 0:
                print("Agua")
                intentos = intentos + 1
                tabla_sin_resolver [filaa -1, columnaa -1] = -1
                print(tabla_sin_resolver)
            case 1:
                print(f"¡Has hundido el barco! Despues de {intentos} intentos")
                intentos = intentos + 1
                print(tabla)
                break
            
partida()