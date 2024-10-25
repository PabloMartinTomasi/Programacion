def matematicas_basicas (numero):
    return numero * 5

numeros = [1, 2, 3, 4, 5]
resultado = list(map(matematicas_basicas, numeros))
print(resultado)