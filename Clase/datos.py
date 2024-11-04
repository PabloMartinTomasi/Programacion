""" agenda = {}

agenda["Miguel"] = "6666666"
agenda ["Lidia"] = "7777777"

nombre = input("Dame el nombre de un contacto nuevo:").lower()
telefono = input(f"Dame el telefono de {nombre}:")

agenda[nombre] = telefono
print (agenda)

agenda["Miguel"] = "1111111"
print(agenda) """

#Tuplas:
tupla1 = (1,2,3)
lista1 = [1,2,3]
#vamos a ver el contenido de la tupla

print("Valores de la tupla")
for i in range(len(tupla1)):
    print(tupla1[1])
    
print("Valores de la lista")
for i in range(len(lista1)):
    print(lista1[1])
    
lista1[0] = 10
print(lista1)