import numpy as np

matriz = np.random.randint(1, 51, size=(4, 3))
maximo = np.max(matriz, axis=0)
print(maximo)