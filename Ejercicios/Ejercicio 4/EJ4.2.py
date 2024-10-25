def encontrar_maximo(numeros):
    if numeros:
        mayor = numeros[0]
        for num in numeros:
            if num > mayor:
                mayor = num
            return mayor
        return None
    
numeros = [3, 5, 2, 9, 1]
maximo = encontrar_maximo(numeros)
print(f"El número más alto en la lista es: {maximo}")