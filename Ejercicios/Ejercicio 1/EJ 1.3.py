numero = input("Ingresa un numero entero positivo:")
numero = int(numero)

if numero > 0:
    suma = sum(range(1, numero + 1))
    print(f"La suma de los numeros desde 1 hasta {numero} es: {suma}")
else:
    print("Por favor, ingresa un número entero positivo.")