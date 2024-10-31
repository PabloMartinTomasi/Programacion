import numpy as np

numeros = np.random.randint(1, 11, size=(3, 3))
with open("matriz.txt", "w") as archivo:
    for fila in numeros:
        archivo.write(','.join(map(str, fila)) + '\n')
        
with open("matriz.txt", "r") as archivo:
    contenido = archivo.readlines()
    
array = np.array([list(map(int, line.strip().split(','))) for line in contenido])
print(array)