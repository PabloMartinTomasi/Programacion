#Funciones en Python
#Todas las funciones comienzan por la palabra reservada "def"
#Vamos a intentar definir todas nuestras funciones en la parte superior de nuestro archivo
#Las funciones se componen de la palabra reservada "def", un nombre y unas paréntesis

""" def suma():
    suma = 2+3
    print(f"La suma es: {suma}")

def resta():
    resta = 2-3
    print(f"La suma es: {resta}")

def multiplica():
    multiplica = 2*3
    print(f"La suma es: {multiplica}")

def divide():
    division = 2/3
    print(f"La suma es: {division}") """

#Realmente nuestro programa principal o main, comienza aquí

""" suma()
resta()
multiplica()
divide()
 """
###################################################

""" def sumapro(numero1, numero2):
    suma = numero1 + numero2
    print(f"La suma de {numero1} y {numero2} es {suma}")
    
def restapro(numero1, numero2):
    resta = numero1 - numero2
    print(f"La resta de {numero1} y {numero2} es {resta}")
    
def multiplicapro(numero1, numero2):
    multiplica = numero1 * numero2
    print(f"La multiplicacion de {numero1} y {numero2} es {multiplica}")
    
def dividepro(numero1, numero2):
    division = numero1 / numero2
    print(f"La division de {numero1} y {numero2} es {division}") """

#comienzo en mi programa

""" num1 = int(input("Dame el primer numero:"))
num2 = int(input("Dame el segundo numero:"))
sumapro(num1, num2)
    
num1 = int(input("Dame el primer numero:"))
num2 = int(input("Dame el segundo numero:"))
restapro(num1, num2)

num1 = int(input("Dame el primer numero:"))
num2 = int(input("Dame el segundo numero:"))
multiplicapro(num1, num2) 

num1 = int(input("Dame el primer numero:"))
num2 = int(input("Dame el segundo numero:"))
dividepro(num1, num2)  """

###################################################

""" def sumapro2(numero1, numero2):
    suma = numero1 + numero2
    return suma

def espar(numero):
    if numero % 2 == 0:
        valor = True
    else:
        valor = False
    return valor

def par_o_impar(numero):
    if numero % 2 == 0:
        valor = True
    else:
        valor = False
    return valor

num1 = int(input("Dame el primer numero:"))
num2 = int(input("Dame el segundo numero:"))

resultadosuma = sumapro2(num1, num2)
print(f"El resultado de la suma es {resultadosuma}")

if espar(num1) == True:
    print(f"El numero {num1} es par")
else:
    print(f"El numero {num1} es impar")

par_o_impar = espar(num2)
if par_o_impar == True:
    print(f"El numero {num2} es par")
else:
    print(f"El numero {num2} es impar") """

#Ejemplos de finciones 
#Ejemplo 1: Función que calcula el área de un triángulo

def area_triangulo(base, altura):
    return (base * altura) / 2

resultado = area_triangulo(4, 5)
print(f"El area del triangulo es {resultado}")

#Ejemplo 2: Función que verifica si un número es par

def es_par(numero):
    if numero % 2 == 0:
        return True
    else:
        return False
    
resultado = es_par(8)
print(f"¿El numero es par?{resultado}")

#Ejemplo 3: Función que saluda de manera personalizada

def saludo_personalizado(nombre, hora_del_dia):
    if hora_del_dia == "mañana":
        print("¡Buenos dias," + nombre + "!")
    elif hora_del_dia == "tarde":
        print("¡Buenas tardes," + nombre + "!")
    else:
        print("¡Buenas noches," + nombre + "!")
        
saludo_personalizado("Laura", "tarde")