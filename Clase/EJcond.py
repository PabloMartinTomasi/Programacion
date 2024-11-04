#Ejercicos de condicionales

""" Ejercicio 1: Cálculo de precio de entrada al cine"""

""" edad = input("Introduce tu edad:")
edad = int(edad)

if edad <5:
    print("Entrada gratuita")
elif edad >= 5 and edad <= 12:
    print("Precio de la entrada 5€")
elif edad >= 13 and edad <=17:
    print("Precio de la entrada 7€")
else:
    print("Precio de la entrada 10€") """


#Ejercicio 2: Clasificación de estudiantes según nota

""" nota = input("Introduce tu nota:")
nota = int(nota)

match nota:
    case 90:
        print("A")
    case 80:
        print("B")
    case 70:
        print("C")
    case 60:
        print("D")
    case _:
        print("F") """
        
  
        
#Ejercicio 3: Días de la semana

""" numero = input("Introduce un numero:")
numero = int(numero)

match numero:
    case 1:
        print("Lunes")
    case 2:
        print("Martes")
    case 3:
        print("Miercoles")
    case 4:
        print("Jueves")
    case 5:
        print("Viernes")
    case 6:
        print("Sábado")
    case 7:
        print("Domingo")
    case _:
        print("Numero inválido") """
        
#Ejercicio 4: Clasificación de usuarios según edad y preferencia de idioma

""" edad = input("Introduce tu edad:")
edad = int(edad)

if edad <12:
    print("Es un niño")
elif edad >= 12 and edad <= 17:
    print("Es un adolescente")
elif edad >= 18 and edad <=59:
    print("Es un adulto")
else:
    print("Es un adulto mayor")
    
idioma = input("Seleciona un idioma entra español(es), inglés(en) y el francés(fr):")
match idioma:
    case "es":
        print("Has selecionado el idioma Español")
    case "en":
        print("Your select language is English")
    case "fr":
        print("Votre langue sélectionnée est le Français") 
    case _:
        print("Idioma no soportado") """
        
#Ejercicio 5: Clasificación de vehículos y selección de color preferido

#Parte 1: Clasificación por tipo de vehículo
"""vehiculo = input("Que tipo de vehiculo tienes:")

if vehiculo == "coche":
    print("Vehiculo de cuatro ruedas")
elif vehiculo == "moto":
    print("Vehiculo de dos ruedas")
elif vehiculo == "bicicleta":
    print("Vehiculo no motorizado")
else:
    print("Tipo de vehiculo no encontrado") """
    
#Parte 2: Color preferido

"""color = input("Introduce tu color preferido:")

match color:
    case "rojo":
        print("Has selecionado el color rojo")
    case "azul":
        print("Has selecionado el color azul")
    case "verde":
        print("Has selecionado el color verde")
    case _:
        print("Ese color no esta disponible")"""



#Ejercicios de bucles
#EJERCICIOS BUCLES PARA PRACTICAR EN CLASE

#Ejercicio 1: Contar números pares
""" numero = (int(input("Ingresa un numero entero:")))
contador = 0
for i in range (1, numero):
    if i % 2 == 0:
        contador = contador + 1
        print("Hay", contador "numeros pares") """
        
#Ejercicio 2: Suma de números hasta que se introduce un negativo

""" print("Debes introducir una serie de numeros positivos, pero si introduces un numero negativo dejara de haber una suma")
suma = 0
while True:
    numero = int(input("Introduce un numero:"))
    if numero >=0:
        suma = suma + numero
    elif numero < 0:
        break
print("La suma total es", suma)
         """
         
#Ejercicio 3: Tabla de multiplicar