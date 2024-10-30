with open("saludo.txt", "r+") as archivo:
    linea = archivo.readline()
    while linea:
        print(linea.strip())
        linea = archivo.readline()