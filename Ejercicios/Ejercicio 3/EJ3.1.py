canciones = []

while True:
    cancion = input("Ingresa los nombres de las canciones que deseas agregar a tu lista de reproducion:")
    if cancion == "fin":
        break
    canciones.append(cancion)
    
print("Tu lista de reproduccion es:")

for i in range(len(canciones)):
    print(f"{i+1} .- {canciones[i]}")
    
n = int(input("Ingresa el numero de la cancion que deseas reproducir:"))
print("Repoduciendo", [n][cancion])