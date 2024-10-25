def sumar_cinco (numero):
    return numero + 5

numeros = [1, 2, 3, 4, 5]
resultado = list(map(sumar_cinco, numeros))
print(resultado)