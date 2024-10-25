productos = []

def introduce_alimento ():
    while True:
        alimento = input("Que alimento vas a introducir:")
        if alimento.lower() == "fin":
            break
        perecedero = input("Es perecedero? (Si/No):")
        producto = {
            "Nombre" : alimento,
            "Perecedero" : "Si" if perecedero.lower() == "si" else "no"
        }
        productos.append(producto)

def perecedero (producto):
    return producto["Perecedero"] == "Si"

introduce_alimento ()

es_perecedero = filter(perecedero, productos)
print(list(es_perecedero))  