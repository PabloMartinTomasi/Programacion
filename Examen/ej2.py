edades = [14, 21, 18, 17, 30, 25]

def es_mayor_de_edad (n):
    return n >= 18

mayor = filter(es_mayor_de_edad, edades)
print(list(mayor))