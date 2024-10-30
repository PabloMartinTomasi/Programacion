with open('notas.txt', 'w') as archivo:
    nota_1 = int(input("Ingresa una nota:"))
    nota_2 = int(input("Ingresa una nota:"))
    nota_3 = int(input("Ingresa una nota:"))
    
    archivo.write(f"{nota_1} \n")
    archivo.write(f"{nota_2} \n")
    archivo.write(f"{nota_3} \n")

with open("notas.txt", "r") as archivo:
    contenido = archivo.read()
    print(contenido)
