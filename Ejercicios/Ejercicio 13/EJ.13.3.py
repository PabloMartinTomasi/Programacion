import numpy as np

with open("notas_estudiantes.txt", "r") as archivo:
    lineas = archivo.readlines()

array = np.array([list(map(float, linea.strip().split(','))) for linea in lineas])

promedio_alumno = np.mean(array, axis=-1)
promedio_clase = np.mean(array)

print(f"El prodemdio del alumno es {promedio_alumno}, y el de la clase es {promedio_clase}")