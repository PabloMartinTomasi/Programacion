print("**********************\nPablo Martin Tomasi\n**********************")

import random #Importamos random
print("Vamos a jugar a piedra, papel, tijera")
punto_maquina = 0 
punto_usuario = 0

while punto_usuario < 3 and punto_maquina < 3:
    maquina = random.randint(1, 3) #Ponemos que el random va de 1 a 3
    while True:
        usuario = int(input("Elige 1- Piedra | 2- Papel | 3- Tijera:"))
        if usuario in [1, 2, 3]:
            break

    if usuario == 1 and maquina == 1: #Si el usuario y la maquina han empatado
        print("El jugador a eligido piedra \nLa maquina a eligido piedra \nHabeis empatado")

    if usuario == 2 and maquina == 2: #Si el usuario y la maquina han empatado
        print("El jugador a eligido papel \nLa maquina a eligido papel \nHabeis empatado")

    if usuario == 3 and maquina == 3: #Si el usuario y la maquina han empatado
        print("El jugador a eligido tijera \nLa maquina a eligido tijera \nHabeis empatado")
   
    if usuario == 1 and maquina == 2: #Si el usuario a perdido la ronda contra la maquina
        print("El jugador a eligido piedra \nLa maquina a eligido papel \nHas perdido!! :)")
        punto_maquina +=1
        
    if usuario == 2 and maquina == 3: #Si el usuario a perdido la ronda contra la maquina
        print("El jugador a eligido papel \nLa maquina a eligido tijera \nHas perdido!! :)")
        punto_maquina +=1
    
    if usuario == 3 and maquina == 1: #Si el usuario a perdido la ronda contra la maquina
        print("El jugador a eligido tijera \nLa maquina a eligido piedra \nHas perdido!! :)")
        punto_maquina +=1
   
    if usuario == 1 and maquina == 3: #Si el usuario a ganado la ronda contra la maquina
        print("El jugador a eligido piedra \nLa maquina a eligido tijera \nHas ganado!! :)")
        punto_usuario += 1
   
    if usuario == 2 and maquina == 1: #Si el usuario a ganado la ronda contra la maquina
        print("El jugador a eligido papel \nLa maquina a eligido piedra \nHas ganado!! :)")
        punto_usuario += 1
   
    if usuario == 3 and maquina == 2: #Si el usuario a ganado la ronda contra la maquina
        print("El jugador a eligido tijera \nLa maquina a eligido papel \nHas ganado!! :)")
        punto_usuario += 1
       
    print(f"La puntuacion del usuario es de {punto_usuario} y la puntuacion de la maquina es de {punto_maquina}")
   
if punto_usuario == 3: #Si el usuario gana 3 rondas, el jugador a ganado
    print("Muy bien has ganado!! :)")
else: #Si la maquina gana 3 rondas, la maquina gana la partida
    print("Has perdido, te deseo mejor suerte para la siguiente partida!")
   
print("*** Ejecucion finalizada. ***")