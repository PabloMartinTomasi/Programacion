tareas_urgentes = []

def introduce_tareas_urgentes ():
    while True:
        nombre_tarea = input("Introduce el nombre de la tarea:")
        if nombre_tarea.lower() == "fin":
            break
        urgente = input("La tarea es urgente? (Si/No)")
        tarea = {
            "Nombre" : nombre_tarea,
            "Urgente" : "Si" if urgente.lower() == "si" else "no"
            }
        tareas_urgentes.append(tarea)
        
def tarea_urgente (tareas):
    return tareas["Urgente"] == "Si"
introduce_tareas_urgentes()

es_urgente = list(filter(tarea_urgente, tareas_urgentes))
print(es_urgente)