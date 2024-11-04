#Ejercicio 2: Usar map() para convertir metros a centímetros
alturas_metros = [1.60, 1.75, 1.80, 1.50]

def metros_a_centimetros(n):
    return n * 100

print(list(map(metros_a_centimetros, alturas_metros)))