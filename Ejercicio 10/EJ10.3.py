import numpy as np


matriz = np.arange(1, 17).reshape((4, 4))
columna = matriz[(matriz >= 9) & (matriz <= 12)]
print(columna)