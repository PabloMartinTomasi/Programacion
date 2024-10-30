import numpy as np

with open("temperaturas.txt", "r") as archivo:
    contenido = archivo.readlines()

array = np.array([float(line.strip()) for line in contenido])

promedio = np.mean(array)
mas_alta = np.min(array)
mas_baja = np.max(array)

print(f"El promedio de las temperaturas es de {promedio}")
print(f"La temperatura mas alta es {mas_alta}")
print(f"La temperatura mas baja es {mas_baja}")