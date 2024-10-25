numeros = []

while True:
    entrada = input("Ingresa una serie de numeros enteros:")
    if entrada.lower() == "hecho":
        break
    try:
        numero = float(entrada)
        numeros.append(numero)
    except ValueError:
        print("Entrada no válida, por favor ingresa un número o'hecho'.")

if numeros:
    mayor = numeros[0]
    for num in numeros:
        if num > mayor:
            mayor = num
        print (f"El numero mas grande que has ingresado es {mayor}")
else:
    print("No has ingresado numeros")