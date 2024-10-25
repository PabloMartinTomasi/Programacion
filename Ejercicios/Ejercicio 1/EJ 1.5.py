import random

numero_secreto = random.randint(1, 100)
intento = None

print("¡Bienvenido al juego de tener que adivinar el numero!")
print("Adivina el numero que he pensado del 1 al 100")

while intento != numero_secreto:
    intento = int(input("Ingresa tu numero: "))
    if intento < numero_secreto:
        print("Uy, casi. El numero eligido es demasiado pequeño. Intenta de nuevo, con un numero mas bajo.")
    elif intento > numero_secreto:
        print("Uy, casi. El numero eligido es demasiado grande. Intenta de nuevo, con un numero mas grande.")
    else:
        print("¡Genial! Has acertado el numero secreto")