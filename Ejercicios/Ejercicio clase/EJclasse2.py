def contar_vocales (n):
    vocales = "aeiouAEIOU"
    contador = 0
    for caracter in n:
        if caracter in vocales:
            contador += 1
    return contador

print(contar_vocales(input("Dame una frase:")))