def es_par(numero):
    if numero % 2 == 0:
        return True
    else:
        return False

numeros = es_par(int(input("Pon un numero entero:")))

print(numeros)