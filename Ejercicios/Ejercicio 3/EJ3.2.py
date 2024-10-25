contactos = {}
while True:
    nombre = input("Ingresa el nombre del contacto (o 'fin' para terminar):")
    if nombre == "fin":
        break
    telefono = input(f"Ingresa el número de teléfono de {nombre}:")
    contactos[nombre] = telefono
    print("Tus contactos son:")
    for nombre, telefono in contactos.items():
        print(f"- {nombre}: {telefono}")
    n = input("Ingresa el nombre del contacto que deseas buscar:")
    if n in contactos:
        print(f"El número de teléfono de {nombre} es {telefono}")