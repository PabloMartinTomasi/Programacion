def calcular_area_circulo(r):
    pi = 3.14
    r = int(input("Ingresa el radio de tu circulo:"))
    return  (pi * r**2)

resultado = calcular_area_circulo(1)
print("El area del circulo es", {resultado})