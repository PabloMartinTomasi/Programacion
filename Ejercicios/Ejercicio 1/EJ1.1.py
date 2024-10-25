n1 = input("Introduce el primer numero:")
n1 = int(n1)
n2 = input("Introduce el segundo numero:")
n2 = int(n2)

operacion = input("Que operacion matematica vas a querer hacer, tienes que eligir entre la suma, resta, multiplicacion y division:")

if operacion == "suma":
    suma = n1 + n2
    print(suma)

if operacion == "resta":
    resta = n1 - n2
    print(resta)
    
if operacion == "multiplicacion":
    multiplicacion = n1 * n2
    print(multiplicacion)
    
if operacion == "division":
    if n2 == 0:
        print("No se a podido hacer la division, vuelve a lanzar el programa porfavor ;)")
    else:
        division = n1 / n2
        print(division)