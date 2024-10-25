import random
monstruos = {
    "vampiro": 3,
    "momia": 2, 
    "bruja": 4, 
    "esqueleto": 1, 
    "fantasma": 5
}
objetos = ["estaca", "poción mágica", "hechizo"]


print("¡Bienvenido a la caza de monstruos de Halloween!")
monstruo = random.choice(list(monstruos.keys()))
dificultad = monstruos[monstruo]
print(f"Un/a {monstruo} a apaerecido con dificultad {dificultad}")

while True:
    objetos = input(f"Para capturar al {monstruo}, tienes que elegir entre estaca, pocion magica o hechizo:")