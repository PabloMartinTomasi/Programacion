itinerario = ("Madrid", "Barcelona", "Valencia", "Sevilla")

for i in range(len(itinerario)):
    print(f"{i+1} . {itinerario[i]}")
    
n = int(input("Ingresa la posicion para saber que ciudad visitaras:"))
if 1 <= n <= len(itinerario):
    print(f"Visitaras {itinerario[n-1]} que esta en la posicion", n)