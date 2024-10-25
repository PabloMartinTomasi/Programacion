vehiculos= []

def introduce_vehiculo():
    while True:
        marca_vehiculo = input("Introduce la marca del vehiculo:")
        if marca_vehiculo.lower() == "fin":
            break
        dueño = input("Pon el nombre del dueño del vehiculo:")
        aprobado = input("La revision tecnica a sido aprobada?(Si/No)")
        vehiculo = {
            "Nombre" : marca_vehiculo,
            "Dueño" : dueño,
            "Aprobado" : "Si" if aprobado.lower() == "si" else "no"
        }
        vehiculos.append(vehiculo)

def revision_tecnica (vehiculo):
    return vehiculo["Aprobado"] == "Si"

introduce_vehiculo ()
es_aprobado = list(filter(revision_tecnica, vehiculos))
print(es_aprobado)