suma_total = 0
contador = 0

while True:
    numero = int(input("Ingresa una serie de numeros enteros:"))
    
    if numero == 0:
        break
    suma_total += numero
    contador += 1
    
if contador > 0:
    promedio = suma_total / contador
    print("El promedio de los numeros que has ingresado es de", promedio)