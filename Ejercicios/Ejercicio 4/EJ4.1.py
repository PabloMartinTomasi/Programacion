def contar_pares(numeros):
    contador = 0
    for numero in numeros:
        if numero % 2 == 0:
            contador += 1
    return contador
numeros = [1, 2, 3, 4, 5, 6]
cantidad_pares = contar_pares(numeros)
print(f"Desde el 1 al 6, hay un total de {cantidad_pares} números pares")