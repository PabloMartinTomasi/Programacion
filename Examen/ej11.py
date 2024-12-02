def es_multiplo_de_tres(n):
    if n % 3 == 0:
        return True
    else:
        return False

numero = es_multiplo_de_tres(int(input("Introduce un numero:")))
print(numero)