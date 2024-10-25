print("**********************\nPablo Martin Tomasi\n**********************")

saldo = float(input("Ingresa tu saldo inicial:")) #Le decimos al usuario que ingrese su dinero
while saldo < 0:
    print("El saldo inicial no puede ser negativo")
    saldo = float(input("Por favor vuelva a ingresar tu saldo inicial:"))

numero_ingreso = 0
numero_retiro = 0
opcion = 0

while opcion != 4:
    print("MENU \n1- Ingresar dinero \n2- Retirar dinero \n3- Mostrar saldo \n4- Salir \n5- Estadisticas")
   
    opcion = int(input("Seleciona una opcion:"))
   
    if opcion == 1: #Si el usuario seleciona la opcion 1, le decimos al usuario cuanto dinero quiere ingresar
        ingreso = float(input("Introduce la cantidad del ingreso:"))
        if ingreso > 0:
            saldo += ingreso
            numero_ingreso += 1
            print(f"Has ingresado un total de {ingreso}€. Tu saldo actual es de {saldo}€")
        else:
            print("No puedes ingresar una cantidad negativa.")
           
    elif opcion == 2: #Si el usuario seleciona la opcion 2, le decimos al usuario cuanto dinero quiere retirar
        retiro = float(input("Introduce la cantidad de dinero que quieres retirar:"))
        if retiro > 0:
            if saldo >= retiro:
                saldo -= retiro
                numero_retiro += 1
                print(f"Has retirado un total de {retiro}€. Tu saldo es de {saldo}€")
            else:
                print("No puedes retirar una cantidad negativa o cero.")
               
    elif opcion == 3: #Si el usuario seleciona la opcion 3, enseñamos al usuario su sueldo actual
        print(f"Tu saldo actual es de {saldo}€")
       
    elif opcion == 4: #Si el usuario seleciona la opcion 4, ceramos el programa
        print("Muchas gracias por usar nuestro servicio. Nos vemos!!")
        break
    
    elif opcion == 5: #Si el usuario seleciona la opcion 5, enseñamos al usuario cuantos ingresos y retiros a hecho
        print(f"Has hecho un total de {numero_ingreso} ingresos \nHas hecho un total de {numero_retiro} retiros")
       
    else: #Si el usuario seleciona una opcion que nos esta en el menu, le decimos que vuelva a selecionar otra
        print("Por favor vuelve a seleccionar una de las opciones del menu")