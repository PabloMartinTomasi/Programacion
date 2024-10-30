import random
import numpy as np

numeros = [random.randint (1, 100) for i in range(10)]
with open("numeros.txt", "w") as archivo:
    archivo.write(f"{numeros} \n")

with open("numeros.txt", "r") as archivo:
    contenido = archivo.read()

array = np.array(contenido)
print(array)