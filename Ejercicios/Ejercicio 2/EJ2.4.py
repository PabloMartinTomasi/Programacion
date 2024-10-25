contraseña_correcta = "python123"

while True:
    contraseña_ingresada = input("Ingresa la contraseña porfavor:")
    if contraseña_ingresada == contraseña_correcta:
        print("Acceso permitido")
        break
    else:
        print("Contraseña inconrecta, intenatalo de nuevo porfavor")