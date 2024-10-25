empleados_activos= []

def introduce_nombre_empleado():
    while True:
        nombre_empleado = input("Introduce el nombre de los empleados:")
        if nombre_empleado.lower() == "fin":
            break
        activo = input("El estado laboral del empleado sigue activo? (Si/No)")
        empleado = {
            "Nombre" : nombre_empleado,
            "Activo" : "Si" if activo.lower() == "si" else "no"
        }
        empleados_activos.append(empleado)
        
def empleado_activo (activo):
    return activo["Activo"] == "Si"
introduce_nombre_empleado ()

es_activo = list(filter(empleado_activo, empleados_activos))
print(es_activo)