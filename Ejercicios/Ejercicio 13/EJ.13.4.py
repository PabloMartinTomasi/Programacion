import random
import numpy as np

numeros = [random.randint (-50, 50) for i in range(15)]
with open("valores.txt", "w") as archivo:
    archivo.write(f"{numeros}\n")
with open("valores.txt", "r") as archivo:
    contenido = archivo.read()

positivos = np.array[contenido > 0]
print(positivos)