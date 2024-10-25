print("********************** \nPablo Martin Tomasi \n**********************")


while True: 
    print("MENU: \n 1 - Cuadrado \n 2 - Rectangulo \n 3 - Salir") #Enseñamos al usuario las opciones del menu
    opcion = int(input("Dime una opcion del menu:")) #Le pedimos al usuario que opcion va a escojer del menu
   
    if opcion == 1: #Si su opcion es la 1 que es el cuadrado, pues vamos a pedirle el lado del cuadrado y luego el programa python le dira el area y perimetro del cuadrado
        lado = float(input("Dame un lado del cuadrado:"))
        area_cuadrado = lado ** 2
        perimetro_cuadrado = 4 * lado
        print(f"El area de tu cuadrado es {area_cuadrado} \nY el perimetro de tu cuadrado es {perimetro_cuadrado}")  
        break
   
    elif opcion == 2: #Si su opcion es la 2 que es el rectanhulo, pues vamos a pedirle el lado del cuadrado y luego el programa python le dira el area y perimetro del cuadrado
        base_rectangulo = float(input("Dame la base del rectangulo:"))
        altura_rectangulo = float(input("Dame la altura del rectangulo:"))
        area_rectangulo = base_rectangulo * altura_rectangulo
        perimetro_rectangulo = 2 * (base_rectangulo +  altura_rectangulo)
        print(f"El area del rectangulo es {area_rectangulo} \nY el perimetro del rectangulo es {perimetro_rectangulo}")
        break
       
    elif opcion == 3: #Si escoje la opcion 3 el bucle se rompera
        print("Saliendo del programa")
        break
   
    else :
        print("La opcion que has eligido no es valida, vuelve a escoger la opcion")