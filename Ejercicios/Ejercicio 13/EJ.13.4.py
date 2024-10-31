import random
import numpy as np


numeros = [random.randint (-50, 50) for i in range(15)]
with open("valores.txt", "w") as archivo:
    for numero in numeros:
        archivo.write(f"{numero}\n")
       
with open("valores.txt", "r") as archivo:
    contenido = archivo.readlines()


array = np.array([int(line.strip()) for line in contenido])
positivos = array[array > 0]


with open("valores_positivos.txt", "w") as archivo:
    for numero in positivos:
        archivo.write(f"{numero}\n")


print(f"Números positivos:{positivos}")