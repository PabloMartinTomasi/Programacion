def suma_hasta_limite(limite):
    suma = 0
    for i in range(1, limite + 1):
        suma += i
    return suma

print(suma_hasta_limite(5))