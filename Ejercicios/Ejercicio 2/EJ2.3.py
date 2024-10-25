nombres = []

while True:
    nombre = input("Ingresa unos nombres:")
    
    if nombre == "fin":
        break
    nombres.append(nombre)
    
print("La lista completa de los nombres es", nombres)

print("Los nombres ingresados uno por uno:")
for nombre in nombres:
    print(nombre)