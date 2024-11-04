archivo = open("mi_archivo.txt", "r")
contenido = archivo.read()
print(contenido)
archivo.close()
print("************************************************************")
with open('mi_archivo.txt', 'r') as archivo:
    contenido = archivo.read()
    print(contenido)
    archivo.close()   
print("************************************************************")
with open('mi_archivo.txt', 'r') as archivo:
    linea = archivo.readline()
    while linea:
        print(linea.strip())
        linea = archivo.readline()
print("************************************************************")
#Leer primera linea
archivo = open("mi_archivo.txt", "r")
contenido = archivo.readline()
print(contenido)
print("************************************************************")
#Leer segunda linea
archivo = open("mi_archivo.txt", "r")
contenido = archivo.readline()
contenido = archivo.readline()
print(contenido)
print("************************************************************")
#Leer tercera linea
archivo = open("mi_archivo.txt", "r")
contenido = archivo.readline()
contenido = archivo.readline()
contenido = archivo.readline()
print(contenido)
print("************************************************************")
""" #Escribir archivos
with open('mi_archivo.txt', 'w') as archivo:
    archivo.write('Hola, este es un archivo de ejemplo. \n')
    archivo.write('Podemos escribir varias líneas así.\n')
print("************************************************************") """
with open('mi_archivo.txt', 'a') as archivo:
    archivo.write('Esta es una línea adicional para probar.\n')
print("************************************************************")