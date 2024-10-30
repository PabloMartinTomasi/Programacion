with open("diario.txt", "a") as archivo:
    añadir = input("Añade una entrada para el dia de hoy:")
    archivo.write(f"\n{añadir}")
    
with open("diario.txt", "r") as archivo:
    contenido = archivo.read()
    print(contenido)