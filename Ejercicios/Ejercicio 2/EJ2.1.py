palabra = input("Que palabra vas a querer invertir?")
palabra_invertida = ""

for i in palabra:
    palabra_invertida = i + palabra_invertida
    
print("La palabra que has eligido cuando esta invertida se ve", palabra_invertida)