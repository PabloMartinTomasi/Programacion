""" mi_nombre = "Pablo"
mi_edad = 17
print("Mi nombre es", mi_nombre)
print("Tengo", mi_edad, "años")


lado = 5
area = lado * lado
print("El area del cuadrado es", area)


edad = 25
es_adulto = edad >= 18
print("¿Es adulto?", es_adulto)


edad = input ("Introduce tu edad: ")
edad = int(edad)
edad_futura = edad + 10
print("En 10 años tendrás", edad_futura, "años")


 print("operaciones aritméticas")


a = 5
b = 3
resultado = a + b
print(resultado)


a = 10
b = 4
resultado = a - b
print(resultado)


a = 6
b = 7
resultado = a * b
print(resultado)


a = 8
b = 2
resultado = a / b
print(resultado)


a = 9
b = 4
resultado = a // b
print(resultado)


a = 10
b = 3
resultado = a % b
print(resultado)


a = 2
b = 3
resultado = a ** b
print(resultado)


print("cadenas de tetxo")


nombre = "Juan"
apellido = "Pérez"
nombre_completo = nombre + " " + apellido
print(nombre_completo)


frase = "Hola! "
repetida = frase * 3
print(repetida)


frase = "Python"
letra = frase[0]
print(letra)


frase = "Python"
longitud = len(frase)
print(longitud)


print("listas")


mi_lista = [1, 2, 3, 4, 5]
print(mi_lista)


mi_lista = ["manzana", "banana", "cereza"]
print(mi_lista[1])


mi_lista = ["manzana", "banana"]
mi_lista.append("cereza")
print(mi_lista)


mi_lista = ["manzana", "banana", "cereza"]
mi_lista.remove("banana")
print(mi_lista)  



 temperatura = input("Introduce la temperatura que hace:") 
temperatura = 30 
temperatura = int(temperatura)
if temperatura > 25:
    print("Hace calor")
else:
    print("Hace frío") 
    
edad = 15
es_estudiante = True

if edad < 18 and es_estudiante:
    print ("Es un estudiante menor de edad")
elif edad < 18 and not es_estudiante:
    print("Es menor de edad pero no es estudiante")
else:
    print("Es mayor de edad") 

nota = 89

if nota >= 90:
    print("Excelente")
elif nota >= 70:
    print("Aprobado")
else:
    print("Reprobado") """


""" for i in range(1 ,11):
    print (i) """
    
""" numeros = [1, 2, 3, 4, 5]
suma = 0
for numero in numeros:
    suma += numero

print("La suma es", suma) """

""" for numero in range(1, 100):
    if numero % 7 == 0:
        print("El primer numero divisible por 7 es", numero)
        break """
        
""" contador = 0
numero = 0
while contador < 5:
    if numero % 2 == 0:
        print(numero)
        contador += 1
    numero += 1
print(f"La cantidad de numeros pares es:{contador}") """