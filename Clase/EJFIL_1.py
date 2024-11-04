#Ejercicio 1: Usar filter() para eliminar los números menores a 10
numeros = [4, 9, 16, 25, 1, 7, 12]
    
def mayor_a_10(n):
    return n > 10

numeros_mayores_10 = filter(mayor_a_10, numeros)
print(list(numeros_mayores_10))